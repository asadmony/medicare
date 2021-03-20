<?php

namespace App\Http\Controllers\Company;

use Auth;
use Hash;
use Session;
use Validator;
use Carbon\Carbon;
use App\Model\User;
use App\Http\Controllers\Controller;
use App\Model\Course;
use App\Model\CourseAssignment;
use App\Model\Message;
use App\Model\TakenCourse;
use App\Model\TakenCourseExam;
use App\Model\TakenPackage;
use App\Model\TakenPackageUser;
use App\Model\CompanySubrole as Subrole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SubroleAssessorController extends Controller
{
    public function assessorAllPackages(Subrole $subrole)
    {
        if (auth()->user()->companyRole->title != 'assessor' && auth()->user()->companyRole->title != 'administrator') {
            abort(401);
        }
        menuSubmenu('assessor','packages');
        $levels = (explode(",",$subrole->level));
        $companyTakenPackages = $subrole->company->takenpackages()->simplePaginate(100);
        return view('subrole.assessor.listPackage',[
            'companyTakenPackages' => $companyTakenPackages,
            'subrole' => $subrole
        ]);
    }
    public function packageDetails(Subrole $subrole, TakenPackage $takenPackage)
    {
        if (auth()->user()->companyRole->title != 'assessor' && auth()->user()->companyRole->title != 'administrator') {
            abort(401);
        }
        menuSubmenu('assessor','packages');
        $assessorLevels = (explode(",",$subrole->level));
        $courses = $takenPackage->courses()->whereIn('course_level', $assessorLevels)->get();
        $takenPackageUsers = $takenPackage->packageUsers->groupBy('company_subrole_id');
        return view('subrole.assessor.packageDetails',[
            'subrole' => $subrole,
            'takenPackageUsers' => $takenPackageUsers,
            'courses' => $courses,
            'takenPackage' => $takenPackage,
        ]);
    }
    public function assignCourse(Subrole $subrole, TakenPackage $takenPackage, Course $course)
    {
        if (auth()->user()->companyRole->title != 'assessor' && auth()->user()->companyRole->title != 'administrator') {
            abort(401);
        }
        menuSubmenu('assessor','takenCourses');
        $subroles = $subrole->company->subroles->where('status', 'active');
        $assignments = $course->assignmentByCompany($subrole->company_id)->get();
        return view('subrole.assessor.assignCourse', [
            'course' => $course,
            'subroles' => $subroles,
            'subrole' => $subrole,
            'takenPackage' => $takenPackage,
            'assignments' => $assignments,
        ]);
    }
    public function assignCourseToUser(Subrole $subrole, TakenPackage $takenPackage, Course $course, Request $request)
    {
        if (auth()->user()->companyRole->title != 'assessor' && auth()->user()->companyRole->title != 'administrator') {
            abort(401);
        }
        menuSubmenu('assessor','packages');
        if (!isset($request->members)) {
            return redirect()->back()->with('error', 'Must select member from the list.');
        }
        $members = $request->members;
        foreach ($members as $member) {
            $takenPackageUser = TakenPackageUser::where('company_subrole_id', $member)->where('company_id', $subrole->company_id)->first();
            if (!$takenPackageUser) {
                $takenPackageUser = new TakenPackageUser;
                $takenPackageUser->user_id = auth()->user()->id;
                $takenPackageUser->company_subrole_id = $member;
                $takenPackageUser->company_id = $subrole->company_id;
                $takenPackageUser->package_id = $takenPackage->pack->id;
                $takenPackageUser->taken_package_id = $takenPackage->id;
                $takenPackageUser->addedby_id = auth()->user()->id;
                $takenPackageUser->save();
            }
            $takenCourseChk = TakenCourse::where('subrole_id', $member)->where('company_id', $subrole->company_id)->where('course_id', $course->id)->first();
            if (!$takenCourseChk) {
                $takenCourse = new TakenCourse;
                $takenCourse->user_id = auth()->user()->id;
                $takenCourse->company_id = $subrole->company_id;
                $takenCourse->subrole_id = $member;
                $takenCourse->package_id = $takenPackage->pack->id;
                $takenCourse->taken_package_id = $takenPackage->id;
                $takenCourse->taken_package_user_id = $takenPackageUser->id;
                $takenCourse->course_id = $course->id;
                $takenCourse->course_from = 'company_package';
                $takenCourse->course_title = $course->title;
                $takenCourse->course_credit = $course->course_credit;
                $takenCourse->attempt_duration = $course->attempt_duration;
                $takenCourse->taken_date = now();
                $takenCourse->expired_date = now()->addDays($takenPackage->duration);
                $takenCourse->addedby_id = auth()->user()->id;
                $takenCourse->save();
            }
        }
        return redirect()->back()->with('success', 'This course is assigned to the selected members!');
    }



    public function saveCourseAssignment(Subrole $subrole, TakenPackage $takenPackage, Course $course, CourseAssignment $assignment, Request $request)
    {
        if (auth()->user()->companyRole->title != 'assessor' && auth()->user()->companyRole->title != 'administrator') {
            abort(401);
        }
        menuSubmenu('assessor','takenCourses');

        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
        ]);

        $assignment->company_id = $subrole->company_id;
        $assignment->course_id = $course->id;
        $assignment->title = $request->title;
        $assignment->description = $request->description;
        $assignment->addedby_id = auth()->user()->id;

        if($request->hasFile('file_name'))
        {
        
            $ffile = $request->file_name;
            $fimgExt = strtolower($ffile->getClientOriginalExtension());
            $fimageNewName = 'br_'.Str::random(8).time().'.'.$fimgExt;
            // $originalName = $ffile->getClientOriginalName();
        
            Storage::disk('upload')->put('course/assignment/'.$fimageNewName, File::get($ffile));
        
                if($assignment->course_brochure)
                {
                    $f = 'course/assignment/'.$assignment->file_name;
                    if(Storage::disk('upload')->exists($f))
                    {
        
                        Storage::disk('upload')->delete($f);
                    }
                }
        
            $assignment->file_name = $fimageNewName;
            // $assignment->brochure_ext = $fimgExt;
        }

        $assignment->save();

        return redirect()->back()->with('success', 'Assignment saved successfully!');
    }

    public function editCourseAssignment(Subrole $subrole, TakenPackage $takenPackage, Course $course,CourseAssignment $assignment)
    {
        if (auth()->user()->companyRole->title != 'assessor' && auth()->user()->companyRole->title != 'administrator') {
            abort(401);
        }
        $assignmentFields = $assignment;
        $subroles = $subrole->company->subroles->where('status', 'active');
        $assignments = $course->assignmentByCompany($subrole->company_id)->get();
        return view('subrole.assessor.assignCourse', compact(
            'subrole',
            'subroles',
            'takenPackage',
            'course',
            'assignments',
            'assignmentFields'
            ));
    }

    public function allTakenCourses(Subrole $subrole)
    {
        if (auth()->user()->companyRole->title != 'assessor' && auth()->user()->companyRole->title != 'administrator') {
            abort(401);
        }
        menuSubmenu('assessor','takenCourses');
        $allTakenCourses = $subrole->company->takenCourses()->groupBy('course_id')->latest()->simplePaginate(20);

        return view('subrole.assessor.courses',[
            'subrole' => $subrole,
            'company' => $subrole->company,
            'allTakenCourses' => $allTakenCourses,
        ]);
    }
    public function takenAttempts(Subrole $subrole)
    {
        if (auth()->user()->companyRole->title != 'assessor' && auth()->user()->companyRole->title != 'administrator') {
            abort(401);
        }
        menuSubmenu('assessor', 'takenAttempts');
        $takenAttempts = $subrole->company->courseExams()->where('total_question', '<>', null)->latest()->paginate(200);
        $accessRole = $subrole->title;
        return view('subrole.assessor.allTakenExamAttempt',[
            'subrole' => $subrole,
            'takenAttempts' => $takenAttempts,
            'accessRole' => $accessRole,
        ]);
    }

    public function CourseExamAttempt(Subrole $subrole, TakenCourse $takenCourse, TakenCourseExam $attempt)
    {
        if (auth()->user()->companyRole->title != 'assessor' && auth()->user()->companyRole->title != 'administrator') {
            abort(401);
        }
        $accessRole = $subrole->title;
        $lastQuestionPaper = $attempt->questionPaper;
        return view('subrole.exam.takenAttemptResponse',[
            'subrole' => $subrole,
            'lastQuestionPaper' => $lastQuestionPaper,
            'takenCourse' => $takenCourse,
            'takenCourseExam' => $attempt,
            'accessRole' => $accessRole,
        ]);
    }

    public function companyMembers(Subrole $subrole)
    {
        if (auth()->user()->companyRole->title != 'assessor' && auth()->user()->companyRole->title != 'administrator') {
            abort(401);
        }
        menuSubmenu('assessor', 'Members');
        $subroles = $subrole->company->subroles()->where('user_id', '<>', auth()->user()->id)->where('status','active')->latest()->paginate(200);
        return view('subrole.assessor.companyMembers',[
            'subrole' => $subrole,
            'company' => $subrole->company,
            'subroles' => $subroles,
        ]);
    }

    public function subroleTakenCourse(Subrole $subrole, Subrole $role)
    {
        // menuSubmenu('exam', 'examResult');
        if (auth()->user()->companyRole->title != 'assessor' && auth()->user()->companyRole->title != 'administrator') {
            abort(401);
        }
        $userTakenCourses  = $subrole->company->takenCourses()->where('subrole_id', $role->id)->latest()->paginate(200);

        return view('subrole.course.companySubroleTakenCourses',[
            'subrole' => $subrole,
            'role' => $role,
            'userTakenCourses' => $userTakenCourses ,
        ]);
    }

    public function courseMatrix(Subrole $subrole)
    {
        menuSubmenu('courseMatrix', 'courseMatrix');
        $levels = $subrole->company->packageCourseLevelsByAssessor($subrole);
        $courses = Course::where('status', '<>', 'temp')
        ->whereIn('course_level', $levels)
        ->groupBy('id')
        ->latest()
        ->get();
        $subroles = Subrole::where('company_id', $subrole->company_id)->where('status', '=', 'active')->where('title', '=', 'member')->latest()->get();

        return view('subrole.course.courseMatrix',compact('subrole','courses','subroles'));
    }

    public function subroleExamAttempts(Subrole $subrole, Subrole $role)
    {
        // menuSubmenu('exam', 'examResult');
        $takenAttempts = $subrole->company->courseExams()->where('subrole_id', $role->id)->where('total_question', '<>', null)->latest()->paginate(200);

        return view('subrole.exam.companyTakenExamAttempt',[
            'subrole' => $subrole,
            'role' => $role,
            'takenAttempts' => $takenAttempts,

        ]);
    }


    public function takenCourseAttempts(Subrole $subrole, TakenCourse $takenCourse)
    {
        if (auth()->user()->companyRole->title != 'assessor' && auth()->user()->companyRole->title != 'administrator') {
            abort(401);
        }
        menuSubmenu('assessor', 'takenCourses');
        $takenAttempts = $subrole->company->courseExams()->where('course_id', $takenCourse->course_id)->where('total_question', '<>', null)->latest()->paginate(200);

        return view('subrole.assessor.allTakenExamAttempt',[
            'subrole' => $subrole,
            'company' => $subrole->company,
            'takenAttempts' => $takenAttempts,
            'takenCourse' => $takenCourse
        ]);
    }
    public function subroleEdit(Subrole $subrole, Subrole $member)
    {
        if ( auth()->user()->companyRole->title != 'administrator') {
            abort(401);
        }
        menuSubmenu('assessor', 'Members');
        return view('subrole.administrator.subroleEdit', ['subrole'=>$subrole,'role'=>$member]);
    }
    public function subroleUpdate(Subrole $subrole, Subrole $member, Request $request)
    {
        if ( auth()->user()->companyRole->title != 'administrator') {
            abort(401);
        }
        menuSubmenu('assessor', 'Members');
        // dd($request->all());
        // dd(["1","2","3"]);
        if ($member->user_id == auth()->user()->id) {
            return redirect()->back()->with('error', 'You can not change yourself!')->withInput();
        }
        if (!$request->level) {
            $level = [];
        }
        else{
            $level = $request->level;
        }
        if($request->title == 'administrator'){
            $level = ["1","2","3","4","5","6","7","8"];
        }
        $member->title = $request->title;
        $member->level = implode(",",$level);
        // $member->zone = $request->zone;
        $member->status = $request->status ? 'active' : 'inactive';
        $member->save();

        // if($request->items)
        // {
        //     $subrole->items()->delete();
        //     foreach ($request->items as $item)
        //     {
        //          $i = new SubroleItem;
        //          $i->company_id = $company->id;
        //          $i->subrole_id = $subrole->id;
        //          $i->user_id = $subrole->user_id;
        //          $i->product_id = $item;
        //          $i->addedby_id = Auth::id();
        //          $i->save();

        //     }
        // }



        return back()->with('success', 'Subrole successfully updated');
    }
    public function subroleDelete(Subrole $subrole, Subrole $role)
    {
        if ( auth()->user()->companyRole->title != 'administrator') {
            abort(401);
        }
        menuSubmenu('assessor', 'Members');
        // $subrole->items()->delete();
        $role->delete();
        return back()->with('success', 'Role successfully deleted');
    }
    public function newUserCreate(Subrole $subrole)
    {
        
        if ( auth()->user()->companyRole->title != 'administrator') {
            abort(401);
        }
        menuSubmenu('assessor', 'Members');

        return  view('subrole.administrator.newUserCreate',['subrole'=>$subrole]);
    }
    public function newUserCreatePost(Subrole $subrole,Request $request)
    {
        if ( auth()->user()->companyRole->title != 'administrator') {
            abort(401);
        }
        menuSubmenu('assessor', 'Members');
    	$validation = Validator::make($request->all(),
        [
            'name' => ['required', 'string', 'max:255','min:3'],
            'email' => ['required', 'string','email', 'unique:users', 'max:255'],
            'mobile' => ['required', 'string'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'active'=> ['nullable'],
        ]);

        if($validation->fails())
        {
            return back()
            ->withInput()
            ->withErrors($validation);
        }

        // $user = new User;
        // $user->name = $request->name;
        // $user->email = $request->email;
        // $user->mobile = $request->mobile;
        // $user->password = $request->password ? Hash::make($request->password) : $user->password;
        // $user->active = $request->active ? true : false;

        // $user->addedby_id = Auth::id();
        // $user->save();

        $pass = rand(10000000,99999999);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->mobile = $request->mobile;
        $user->password = $pass ? Hash::make($pass) : $user->password;
        $user->password_temp = $pass;
        // $user->active = $request->active ? true : false;

        $user->addedby_id = Auth::id();
        $user->save();

        $mail = mail($user->email, "{$subrole->company->title} invited you to join {$_SERVER['SERVER_NAME']}", 'donotreply@medicare.com', "Dear {$user->name}, join {$_SERVER['SERVER_NAME']}. Your credentials are email: {$user->email} , password: {$pass} . Please, login {$_SERVER['SERVER_NAME']} and change your password.");

       	return back()->with('success', 'Invitation sent successfully!');



    }
    public function subroleAdd(Subrole $subrole)
    {
        if ( auth()->user()->companyRole->title != 'administrator') {
            abort(401);
        }
        menuSubmenu('assessor', 'Members');
        return view('subrole.administrator.newSubrole', [
            'subrole' => $subrole,
            'company' => $subrole->company,
        ]);
    }
    public function subroleSave(Subrole $subrole, Request $request)
    {
        if ( auth()->user()->companyRole->title != 'administrator') {
            abort(401);
        }
        menuSubmenu('assessor', 'Members');
        // dd($request->all());
        if (!$request->level) {
            $level = [];
        }
        else{
            $level = $request->level;
        }
        if($request->title == 'administrator'){
            $level = ["1","2","3"];
        }
        $checkUser = Subrole::where('user_id', $request->user)->first();
        if ($checkUser) {
            if ($checkUser->user_id == auth()->user()->id) {
                return redirect()->back()->with('error', 'You can not change yourself!')->withInput();
            }
            $checkUser->title = $request->title;
            $checkUser->level = implode(",",$level);
            // $checkUser->zone = $request->zone;
            $checkUser->status = $request->status ? 'active' : 'inactive';
            $checkUser->save();
        }else{
            $userRole = new Subrole;
            $userRole->company_id = $subrole->company_id;
            $userRole->user_id = $request->user;
            $userRole->title = $request->title;
            $userRole->level = implode(",",$level);
            // $userRole->zone = $request->zone;
            $userRole->status = $request->status ? 'active' : 'inactive';
            $userRole->save();
        }
        return redirect()->back()->with('success', 'Company Subrole is saved.')->withInput();
    }
    public function message(Subrole $subrole, User $messageTo)
    {
        menuSubmenu('subrole', 'Messages');
        $messageFrom = auth()->user(); 
        if($messageFrom->id == $messageTo->id)
        {
            abort(401);
        }
        $role_from = 'company_'.$subrole->title;
        $conversation = auth()->user()->messageWithUser($messageTo);
        $conversations = auth()->user()->messageContacts();
        return view('subrole.message', compact('messageFrom', 'role_from' , 'messageTo', 'conversation','conversations'));
    }
    public function messages(Subrole $subrole)
    {
        menuSubmenu('subrole', 'Messages');
        $messageFrom = auth()->user();
        $role_from = 'company_'.$subrole->title;
        $conversations = auth()->user()->messageContacts();
        if ($conversations->count() > 0) {
            if ($conversations[0]->userto_id == $messageFrom->id) {
                $messageTo = User::find($conversations[0]->userfrom_id);
            }else{
                $messageTo = User::find($conversations[0]->userto_id);
            }
            $conversation = $conversations[0]->conversation($messageTo->id,$messageFrom->id);
        }else{
            $conversation = null;
            $messageTo = null;
        }
        return view('subrole.message', compact('messageFrom',  'role_from','conversations', 'messageTo', 'conversation'));
    }

    public function searchMemberAjax(Subrole $subrole, Request $request)
    {
        $q = $request->q;
        $allmembers = $subrole->company->searchMembers($q);

        
        $page = View('subrole.modules.dashboardUserInfoCard',['allmembers' =>$allmembers, 'subrole'=> $subrole])->render();
        // dd($page);
        if($request->ajax())
        {
            return Response()->json(array(
            'success' => true,
            'page' => $page,
            ));
        }

    }
    
}
