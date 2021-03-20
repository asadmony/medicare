<?php

namespace App\Http\Controllers\Company;

use PDF;
use Auth;
use Hash;
use Session;
use Validator;
use Carbon\Carbon;
use App\Model\User;
use App\Model\Course;
use App\Model\CourseAnswer;
use App\Model\TakenCourse;
use Illuminate\Http\Request;
use App\Model\CompanySubrole as Subrole;
use App\Model\Product;
use App\Model\TakenPackageUser;
use App\Model\ProductSettingData;
use App\Model\ProductAlarmData;
use App\Model\TakenCourseExam;
use App\Model\TakenCourseExamItem;
use Illuminate\Support\Str;


use App\Http\Controllers\Controller;
use App\Model\CourseAssignment;
use App\Model\CourseAssignmentAnswer;
use App\Model\CreditTransaction;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class SubroleController extends Controller
{
    public function dashboard(Subrole $subrole)
    {
        menuSubmenu('dashboard','dashboard');

    	return view('subrole.dashboard', [
            'subrole'=>$subrole,
            ]);
    }

    public function allPackages(Subrole $subrole)
    {
        menuSubmenu('package','allpackage');

        $takenPackUsers = $subrole->packageUsers()->paginate(100);

        return view('subrole.package.listPackage',[
            'takenPackUsers' => $takenPackUsers,
            'subrole' => $subrole
        ]);

    }

    public function takenCourses(Subrole $subrole)
    {
        menuSubmenu('course','allcourses');

        $userTakenCourses = $subrole->takenCourses()->paginate(100);

        return view('subrole.course.companyTakenCourses',[
            'userTakenCourses' => $userTakenCourses,
            'subrole' => $subrole
        ]);

    }

    public function takenAttempts(Subrole $subrole)
    {
        menuSubmenu('exam','examResult');

        $takenAttempts = $subrole->takenCourseAttempts()->where('total_question', '<>', null)->paginate(100);
        return view('subrole.exam.companyTakenAllAttemps',[
            'takenAttempts' => $takenAttempts,
            'subrole' => $subrole,
        ]);

    }

    public function takenAttemptCertificates(Subrole $subrole)
    {
        menuSubmenu('certificate','certificate');

        $takenAttempts = $subrole->takenCourseAttempts()->where('total_question', '<>', null)->where('certificate_file', '<>', null)->paginate(100);
        $certificatesOnly = 1;
        return view('subrole.exam.companyTakenAllAttemps',[
            'takenAttempts' => $takenAttempts,
            'subrole' => $subrole,
            'certificatesOnly' => $certificatesOnly,
        ]);

    }

    public function takenAttemptDetails(Subrole $subrole)
    {
        menuSubmenu('exam','examResult');

        $takenAttempts = $subrole->takenCourseAttempts()->where('total_question', '<>', null)->paginate(100);
        $company = $subrole->company;
        return view('subrole.exam.takenAtte',[
            'takenAttempts' => $takenAttempts,
            'subrole' => $subrole,
            'company' => $company
        ]);

    }

    public function takenPackageDetails(Subrole $subrole, TakenPackageUser $takenPackUser)
    {
        menuSubmenu('package','allpackage');
        $levels = (explode(",",$takenPackUser->takenPackage->course_level));
        $courses = Course::whereIn('course_level',$levels)->where('status', 'published')->get();

        $userTakenCourses = $subrole->takenCourses()->where('taken_package_id', $takenPackUser->taken_package_id)->latest()->paginate(20);
        // $userTakenCourses = $takenPackUser->takenCourses()->latest()->paginate(20);
        // $lastExam = $userTakenCourses[0]->takenCourseExams()->where('total_question', "<>", null)->latest()->first();
        // dd($lastExam);
        return view('subrole.package.allCoursesForUser',[
            'subrole' => $subrole,
            'takenPackUser' => $takenPackUser,
            'courses' => $courses,
            'userTakenCourses' => $userTakenCourses
        ]);
    }

    public function takePackageCourse(Subrole $subrole, Course $course)
    {
        $takenPackUser= TakenPackageUser::find(request()->takenPackUser);
        $checkEnrollment = TakenCourse::where('taken_package_user_id',$takenPackUser->id)
            ->where('course_id',$course->id)->where('taken_package_id',$takenPackUser->taken_package_id)->first();
        if($checkEnrollment)
        {
            return back()->with('info','This Course Already Taken.');
        }

        $takenCourse = new TakenCourse;

        $takenCourse->user_id = auth()->user()->id;
        $takenCourse->company_id = $subrole->company_id;
        $takenCourse->subrole_id = $subrole->id;
        $takenCourse->package_id = $takenPackUser->package_id;
        $takenCourse->course_id = $course->id;
        $takenCourse->course_title = $course->title;
        $takenCourse->course_credit = $course->course_credit;
        $takenCourse->course_from = 'company_package';
        $takenCourse->taken_package_id = $takenPackUser->taken_package_id;
        $takenCourse->taken_package_user_id = $takenPackUser->id;
        $takenCourse->taken_date = Carbon::now() ;
        $takenCourse->expired_date =Carbon::now()->addDays(365);
        // 1year expire date 365

        // $course->attempt_started_at = hee ;
        $takenCourse->addedby_id = auth()->user()->id;

        $takenCourse->save();

        return back()->with('success','You are enrolled to the course.');
    }

    public function takenCourseDetails(Subrole $subrole, TakenCourse $takenCourse)
    {
        return view('subrole.course.takenCourseDetails',[
            'takenCourse' => $takenCourse,
            'subrole' => $subrole,
        ]);
    }

    public function allCourseExams(Subrole $subrole, TakenCourse $takenCourse)
    {
        $takenCourseExam = TakenCourseExam::where('subrole_id', $subrole->id)->where('taken_course_id', $takenCourse->id)->latest()->first();
        $lastQuestionPaper = $takenCourseExam->questionPaper;
        return view('subrole.exam.allTakenCourseAttempt',[
            'subrole' => $subrole,
            'lastQuestionPaper' => $lastQuestionPaper,
            'takenCourse' => $takenCourse,
            'takenCourseExam' => $takenCourseExam
        ]);
    }

    public function CourseExamAttempt(Subrole $subrole, TakenCourse $takenCourse, TakenCourseExam $attempt)
    {
        $lastQuestionPaper = $attempt->questionPaper;
        return view('subrole.exam.takenAttemptResponse',[
            'subrole' => $subrole,
            'lastQuestionPaper' => $lastQuestionPaper,
            'takenCourse' => $takenCourse,
            'takenCourseExam' => $attempt
        ]);
    }

    public function takeAttemptCourseExam(Subrole $subrole, TakenCourse $takenCourse)
    {
        $isTiopic = $takenCourse->course->topics;
        $isQuestionPapers = $takenCourse->course->questionPapers;
        if ($isTiopic->count() < 1) {
            return redirect()->back()->with('error', 'No Topic found under this course!');
        }elseif($isQuestionPapers->count() < 1) {
            return redirect()->back()->with('error', 'No Question paper found under this course!');
        }else {
            $takenCourseExam = TakenCourseExam::where('subrole_id', $subrole->id)->where('taken_course_id', $takenCourse->id)->where('total_question', null)->first();
            if ($takenCourseExam) {
                $questionPaper = $takenCourseExam->questionPaper;
            }else {
                $firstAttempt = $subrole->takenCourseAttempts()->first();
                $questionPaper = $takenCourse->course->questionPapers->random(1)->first();
                $takenCourseExam = TakenCourseExam::create([
                    'user_id' => auth()->user()->id,
                    'company_id' => $subrole->company_id,
                    'subrole_id' => $subrole->id,
                    'package_id' => $takenCourse->package_id,
                    'taken_package_id' => $takenCourse->taken_package_id,
                    'course_id' => $takenCourse->course_id,
                    'attempt_started_at' => $firstAttempt ? $firstAttempt->attempt_started_at : now(),
                    'taken_course_id' => $takenCourse->id,
                    'question_paper_id' => $questionPaper->id,
                    'course_from' => $takenCourse->course_from,
                ]);
            }
            return view('subrole.exam.takenCourseAttempt',[
                'subrole' => $subrole,
                'questionPaper' => $questionPaper,
                'takenCourse' => $takenCourse,
                'takenCourseExam' => $takenCourseExam
            ]);

        }
    }

    public function submitAssignment(Subrole $subrole, TakenCourse $takenCourse, CourseAssignment $assignment)
    {
        if (auth()->user()->id != $subrole->user_id) {
            abort(401);
        }
        return view('subrole.course.submitAssignment',[
            'subrole' => $subrole,
            'takenCourse' => $takenCourse,
            'assignment' => $assignment,
        ]);
    }

    public function submitAssignmentPost(Subrole $subrole, TakenCourse $takenCourse, CourseAssignment $assignment, Request $request)
    {
        if (auth()->user()->id != $subrole->user_id) {
            abort(401);
        }
        $validated = $request->validate([
            'answer' => 'required',
        ]);
        $ans = new CourseAssignmentAnswer;
        $ans->course_assignment_id = $assignment->id;
        $ans->company_id = $subrole->company_id;
        $ans->course_id = $assignment->course_id;
        $ans->user_id = $subrole->user_id;
        $ans->subrole_id = $subrole->id;
        $ans->answer = $request->answer;

        if($request->hasFile('file'))
        {
        
            $ffile = $request->file;
            $fimgExt = strtolower($ffile->getClientOriginalExtension());
            $fimageNewName = 'br_'.Str::random(8).time().'.'.$fimgExt;
            // $originalName = $ffile->getClientOriginalName();
        
            Storage::disk('upload')->put('course/assignment/'.$fimageNewName, File::get($ffile));
        
                if($ans->file_name)
                {
                    $f = 'course/assignment/'.$ans->file_name;
                    if(Storage::disk('upload')->exists($f))
                    {
                        Storage::disk('upload')->delete($f);
                    }
                }
        
            $ans->file_name = $fimageNewName;
            // $assignment->brochure_ext = $fimgExt;
        }

        $ans->save();

        return redirect()->route('subrole.takenCourseDetails', [$subrole, $takenCourse])->with('success', 'Your Assignment has been submitted successfully!');
    }

    public function submitAttemptCourseExam(Request $request, Subrole $subrole, TakenCourseExam $takenCourseExam)
    {
        if ($takenCourseExam->subrole_id != $subrole->id) {
            abort(401);
        }
        $questionItems= $takenCourseExam->questionPaper->items;
        foreach ($questionItems as $item) {
            $question = $item->question;
            $givenAns = CourseAnswer::where('course_question_id', $question->id)->where('correct', 1)->first();
            if ($givenAns->id == $request['question_'.$question->id]) {
                $correct = 1;
            }else {
                $correct = 0;
            }
            TakenCourseExamItem::create([
                'user_id' => auth()->user()->id,
                'company_id' => $subrole->company_id,
                'subrole_id' => $subrole->id,
                'package_id' => $takenCourseExam->package_id,
                'taken_package_id' => $takenCourseExam->taken_package_id,
                'course_id' => $takenCourseExam->course_id,
                'question_paper_id' => $takenCourseExam->question_paper_id,
                'taken_course_id' => $takenCourseExam->taken_course_id,
                'taken_course_exam_id' => $takenCourseExam->id,
                'course_question_id' => $question->id,
                'course_answer_id' => $request['question_'.$question->id],
                'correct' => $correct,
                'question_type' => $question->question_type,
                'answer' => $givenAns->answer,
            ]);
        }
        $lastUsedCreditExam = $subrole->takenCourseAttempts()
                                        ->where('course_id',$takenCourseExam->course_id)
                                        ->where('total_question', '<>',null)
                                        ->where('used_credit', '<>', 0)
                                        ->latest()->first();
        $examTakenCourse = $takenCourseExam->takenCourse;
        $examTakenPackage = $takenCourseExam->takenPackage;
        if ($lastUsedCreditExam) {
                if (now()->subDays($examTakenCourse->attempt_duration) > $lastUsedCreditExam->last_attempt_started_at) {
                    $credit = $examTakenCourse->course_credit;
                }else {
                    $credit = 0;
                }
        }else {
            $credit = $takenCourseExam->takenCourse->course_credit;
            // dd($takenCourseExam->takenPackage);
        }
        if ($credit > 0) {
            $examTakenPackage->used_credit = $examTakenPackage->used_credit+$credit;
            $examTakenPackage->save();

            $creditTrans = new CreditTransaction;
            $creditTrans->user_id               = null;
            $creditTrans->company_id            = $subrole->company_id;
            $creditTrans->company_subrole_id    = $subrole->id;
            $creditTrans->package_id            = null;
            $creditTrans->taken_package_id      = $takenCourseExam->taken_package_id;
            $creditTrans->course_id             = $takenCourseExam->course->id;
            $creditTrans->taken_course_id       = $takenCourseExam->takenCourse->id;
            $creditTrans->taken_course_exam_id  = $takenCourseExam->id;
            $creditTrans->order_id              = null;
            $creditTrans->previous_credit       = ($examTakenPackage->no_of_credits - $examTakenPackage->used_credit) + $credit;
            $creditTrans->transferred_credit    = $credit;
            $creditTrans->current_credit        = $examTakenPackage->no_of_credits - $examTakenPackage->used_credit;
            $creditTrans->transaction_type      = 'used';
            $creditTrans->credit_from           = 'company_package';
            $creditTrans->credit_for            = 'taken_exam';
            $creditTrans->addedby_id            = auth()->user()->id;
            $creditTrans->transaction_date      = now();
            $creditTrans->save();
        }
        $attemptCount = $subrole->takenCourseAttempts()->count();
        $correctAns = $takenCourseExam->takenCourseExamItems()->where('correct', 1)->count();
            $upCourseExamData = [
                'used_credit' => $credit ? $credit : 0,
                'no_of_attempts' => $attemptCount,
                'last_attempt_started_at' => now(),
                'total_question' => $questionItems->count(),
                'correct_answer' => $correctAns,
            ];
        $takenCourseExam->update($upCourseExamData);
        $result = $takenCourseExam->correct_answer/$takenCourseExam->total_question*100;
        $takenCourseExam->update($upCourseExamData);
        $resultPercentage = ($correctAns * 100) /$questionItems->count();
        if ($resultPercentage >= config('parameter.pass_score')) {
            $name = auth()->user()->name;
            $filename = Str::slug($name).'_'.$examTakenCourse->course_title.'_Exam-'.$takenCourseExam->id.'_'.Str::slug(now()->toString());
            $certificateData = [
                'user' => auth()->user()->name,
                'course' => $examTakenCourse->course_title,
                'expire_date' => now()->addDays(365),
            ];
            $pdf = PDF::loadView('certificate', compact('certificateData'))->setOptions(['defaultFont' => 'sans-serif','isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);
            Storage::disk('upload')->put("certificates/{$filename}.pdf", $pdf->output());
            $takenCourseExam->update([
                'certificate_file' => "certificates/{$filename}.pdf",
            ]);
        }
        return redirect()->back()->with('success', 'Answer script has been submitted!');

    }

    public function deviceSearch(Subrole $subrole,Request $request)
    {
        $q = $request->q;
        $it = $subrole->items()->pluck('product_id');


        $items = Product::where(function($query) use ($q){
            $query->where('macid', 'like', "%{$q}%");
            $query->orWhere('title', 'like', "%{$q}%");
            $query->orWhere('region', 'like', "%{$q}%");
            $query->orWhere('zone', 'like', "%{$q}%");
        })
        ->whereIn('id',$it)
        ->paginate(20);

        return view('subrole.allProducts', [

            'q'=>$request->q,
            'items' => $items,
            'subrole'=>$subrole
        ]);
    }

    public function allProduct(Subrole $subrole)
    {
        menuSubmenu('device','servicesAll');

        $items = $subrole->items()->pluck('product_id');

        $products = Product::where('status','active')->whereIn('id',$items)->paginate(20);


        return view('subrole.allProducts', [
            'subrole'=>$subrole,
            'items' => $products,
            'company' => $subrole->company
            ]);
    }

    public function productsAllOfType(Subrole $subrole, Request $request)
    {
        $type = $request->type;
        $status = $request->status ?: '';
        menuSubmenu('device', 'productsAllOfType'.$type.$status);

        $items = $subrole->items()->pluck('product_id');

        $products = Product::where('status','active')
        ->whereIn('id',$items)
        ->where(function($qq) use ($type,$status) {

            $qq->where('type', $type);

            if($status == 'online')
            {
                $qq->where('location_offline', 0);
            }
            elseif($status == 'offline')
            {
                $qq->where('location_offline', 1);
            }

        })
        ->paginate(20);

        return view('subrole.allProducts', [
            'subrole'=>$subrole,
            'items' => $products,
            'company' => $subrole->company,
            'type' => $type,
            'status' => $status
            ]);
    }

    public function allLatestData(Subrole $subrole, Request $request)
    {
        $type = $request->type ?: '';

        menuSubmenu('DataMonitor','productsAllActivities'.$type);

        $items = $subrole->items()->pluck('product_id');

        $settingDatas = ProductSettingData::with('productLocationData','productData')
        ->whereIn('product_id',$items)
        ->whereHas("product",function($qq) use ($type)
            {
                if($type == "battery"){
                    $qq->where('type',$type);
                }
                elseif($type == "rectifier"){
                    $qq->where('type',$type);
                }

            })
        ->paginate(15);
        // dd($settingDatas);
        return view('subrole.allLatestData', [
            'subrole'=>$subrole,
            'settingDatas' => $settingDatas,
            'company' => $subrole->company,
            'type' => $type
            ]);
    }

    public function singleDeviceSingleDataDetails(Subrole $subrole, ProductSettingData $data)
    {
        $product = $subrole->items()->pluck('product_id');

        $alarms = ProductAlarmData::whereIn('product_id',$product)
        ->where('macid',$data->macid)
        ->where('hide', 0)
        ->orderBy('send_time','desc')
        ->latest()
        ->paginate(50);



        return view('subrole.singleDeviceSingleDataDetails',[
            'subrole'=>$subrole,
            'sd'=>$data,
            'product'=> $data->product,
            'alarmData' => $alarms,
            'company' => $subrole->company
        ]);
    }

    public function dataFilter(Subrole $subrole, Request $request)
    {
        $type = $request->type ? : '';
        menuSubmenu('DataMonitor','dataFilter'.$type);
        $items = $subrole->items()->pluck('product_id');

        $macids = Product::whereIn('id',$items)->paginate(5);
        // dd($macids);
        return view('subrole.allDatafilter',[
            'subrole' => $subrole,
            'macids' => $macids,
            'company' => $subrole->company,
            'type' => $type
        ]);
    }

    public function searchFilterData(Subrole $subrole, Request $request)
    {
        $type = $request->type;

        menuSubmenu('DataMonitor','dataFilter'.$type);

        $fromDate = $request->from ?: date('Y-m-d');
        $toDate = $request->to ?: date('Y-m-d');
        $macids = $request->macids;
        $page = $request->pages ?: 20;

        $company = $subrole->items()->pluck('product_id');

        $items = ProductSettingData::whereIn('product_id', $company)
        ->whereBetween('created_at', [$fromDate." 00:00:00",$toDate." 23:59:59"])
        ->whereHas('product',function($query) use ($macids, $type)
        {

            if($macids)
            {
                $query->whereIn('macid', $macids);
            }
            if($type=='battery')
            {
                $query->where('type',$type);
            }elseif($type=='rectifier'){
                $query->where('type',$type);
            }

        })
        ->latest()
        ->paginate($page);

        $device = Product::whereIn('id',$company)->paginate(5);


        return view('subrole.allFilterDataSearch',[
            'subrole' => $subrole,
            'items' => $items,
            'filter' => $request->filter ?: [],
            'macids' => $request->macids ?: [],
            'from' =>$fromDate,
            'to' =>$toDate,
            'pages' => $page,
             'device' => $device,
             'company' => $subrole->company,
             'type' => $type
        ]);
    }

    public function alarmDataFilter(Subrole $subrole)
    {
        menuSubmenu('alarmData','alarmDataFilter');

        $items = $subrole->items()->pluck('product_id');
        $macids = Product::whereIn('id',$items)->paginate(5);

        return view('subrole.alarmFilter',[
            'subrole' => $subrole,
            'macids' => $macids,
            'company' => $subrole->company
        ]);
    }

    public function alarmSearch(Subrole $subrole, Request $request)
    {
        // dd($request->all());
        menuSubmenu('alarmData','alarmDataFilter');

        $fromDate = $request->from ?: date('Y-m-d');
        $toDate = $request->to ?: date('Y-m-d');

        $fDate = strtotime($fromDate)*1000;
        $tDate = strtotime($toDate)*1000;

        $macids = $request->macids;
        $page = $request->pages ?: 20;

        $company = $subrole->items()->pluck('product_id');
        $allMacid = Product::whereIn('id',$company)->paginate(5);

        $items = ProductAlarmData::whereIn('product_id', $company)
        ->whereBetween('created_at', [$fromDate." 00:00:00",$toDate." 23:59:59"])
        ->where(function($query) use ($macids)
        {

            if($macids)
            {
                $query->whereIn('macid', $macids);
            }

        })
        ->latest()
        ->paginate($page);

        return view('subrole.alarmFilterSearch',[
            'subrole' => $subrole,
            'items' => $items,
            'macids' => $request->macids ?: [],
            'filter' => $request->filter ?: [],
            'from' =>$fromDate,
            'to' =>$toDate,
            'pages' => $page,
            'allMacid'=> $allMacid,
            'company' => $subrole->company
        ]);

    }

    public function allAlarmData(Subrole $subrole)
    {
        menuSubmenu('alarmData','alarmsAllDevice');
        $items = $subrole->items()->pluck('product_id');
        $datas = ProductAlarmData::whereIn('product_id',$items)
        // ->where('hide', 0)
        ->orderBy('send_time','desc')
        ->latest()
        ->paginate(15);

        return view('subrole.alarmsAll',[
            'subrole'=>$subrole,
            'datas' => $datas,
            'company' => $subrole->company
        ]);
    }

    public function editUserDetails(Subrole $subrole)
    {
        menuSubmenu('userInfo','editUserDetails');

        $user = Auth::user();
        return view('subrole.editUserDetails', ['user'=>$user, 'subrole'=>$subrole,'company' => $subrole->company]);
    }

    public function updateUserDetails(Subrole $subrole, Request $request)
    {
        $validation = Validator::make($request->all(),
        [
            'name' => ['required', 'string', 'max:255','min:3'],
            'email' => ['required', 'string','email', 'unique:users,email,'.Auth::id(), 'max:255'],
            'mobile' => ['required', 'string'],

        ]);

        if($validation->fails())
        {

            return back()
            ->withInput()
            ->withErrors($validation);
        }

        $user = Auth::user();

        $user->name = $request->name ?: $user->name;
        $user->email = $request->email ?: $user->email;
        $user->mobile = $request->mobile ?: $user->mobile;

        $user->editedby_id = Auth::id();
        $user->save();

        return back()->with('success', 'User successfully Updated');

    }

    public function editUserPassword(Subrole $subrole)
    {
        menuSubmenu('userInfo', 'editUserPassword');
        $user = Auth::user();
        return view('subrole.editUserPassword',['subrole'=>$subrole, 'user'=> $user,'company' => $subrole->company]);
    }

    public function updateUserPassword(Subrole $subrole, Request $request)
    {

        $validation = Validator::make($request->all(),
        [
            // 'oldPassword' =>'min:6',
            'password' => 'required|min:6|confirmed',
            // 'father_name' => 'string'
        ]);
        if($validation->fails())
        {
            return back()
            ->withErrors($validation)
            ->withInput()
            ->with('error', ' Please, Try Again with Correct Password Information.');
        }

        $user = Auth::user();


        if($request->current_password  and (Hash::check($request->current_password, $user->password)))
        {
            $request->user()->fill([
            'password' => Hash::make($request->password)
            ])->save();

            return back()
            ->with('success',' Your Password Successfully Updated!');

        }
        else
        {
            return back()->with('error', 'Please try again with correct information.');
        }
    }

    public function singleDeviceAllData(Subrole $subrole, Request $request)
    {
        $product = Product::where('id', $request->product)->first();

        // dd($product);

        if($product)
        {
           $settingDatas = $product->productSettingDatas()
           ->with('productData','productLocationData')
           ->latest()
           ->paginate(15);

           return view('subrole.singleDeviceAllData', [

            'product' => $product,
            'settingDatas' => $settingDatas,
            'subrole' =>$subrole,
            'company' => $subrole->company
           ]);


        }

        return back();
    }

    public function singleDeviceAlarmData(Subrole $subrole, Request $request)
    {
        $product = Product::where('macid', $request->macid)->first();

        if($product)
        {
            $datas = $product->productAlarmDatas()->latest()->paginate(5);
            return view('subrole.singleAlarmData',[
                'subrole'=>$subrole,
                'datas' => $datas,
                'company' => $subrole->company
                ]);
        }

        return back();
    }

    public function singleDeviceMap(Subrole $subrole, Request $request)
    {
        $products = Product::where('macid', $request->macid)->first();

        // $datas = $product->productLocationDatas()->latest()->paginate(2);
        // dd($datas);
        $product = $products->productLocationDatas()->latest()->first();

        if($product)
        {
            return view('subrole.singleDeviceMapLocation',[
               'product' => $product,
                'company' => $subrole->company,
                'subrole' => $subrole
            ]);
        }
        Session::flash('message', "Device Location Not Found");
        return back();
    }

     public function onlineServicesAll(Subrole $subrole, Request $request)
    {
        menuSubmenu('dashboard', 'onlineServicesAll');

        $items = $subrole->items()->pluck('product_id');

        $products = Product::where('status','active')->where('location_offline', 0)->whereIn('id',$items)->paginate(20);

       return view('subrole.allProducts',[
            'company'=>$subrole->company,
            'items' => $products,
            'subrole' => $subrole
        ]);

    }

    public function offlineServicesAll(Subrole $subrole, Request $request)
    {
        menuSubmenu('dashboard', 'offlineServicesAll');

        $items = $subrole->items()->pluck('product_id');

        $products = Product::where('status','active')->where('location_offline', 1)->whereIn('id',$items)->paginate(20);

       return view('subrole.allProducts',[
            'company'=>$subrole->company,
            'items' => $products,
            'subrole' => $subrole
        ]);
    }
    public function deleteCourseAssignment(CourseAssignment $assignment)
    {
        if($assignment->file_name)
        {
            $f = 'course/assignment/'.$assignment->file_name;
                if(Storage::disk('upload')->exists($f))
                {
                    Storage::disk('upload')->delete($f);
                }
        }
        foreach ($assignment->answers as $ans) {
            if($ans->file_name)
            {
            $f = 'course/assignment/'.$ans->file_name;
                if(Storage::disk('upload')->exists($f))
                {
                    Storage::disk('upload')->delete($f);
                }
            }
            $ans->answers()->delete();
        }
        $assignment->delete();
        return redirect()->back()->with('success', 'Assignment has deleted!');
        
    }
}
