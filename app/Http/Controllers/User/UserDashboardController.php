<?php

namespace App\Http\Controllers\User;

use DB;
use PDF;
use Auth;
use Hash;
use Session;
use Validator;
use Carbon\Carbon;
use App\Model\User;
use GuzzleHttp\Client;
use App\Model\Product;
use Illuminate\Http\Request;
use App\Model\CompanySubrole;
use App\Model\CourseAnswer;
use App\Model\TakenCourseExam;
use App\Model\TakenCourseExamItem;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;
use App\Model\TakenPackage;
use Illuminate\Support\Facades\Storage;
use GuzzleHttp\Exception\GuzzleException;
use App\Model\Course;
use App\Model\Company;
use App\Model\CourseAssignment;
use App\Model\CourseAssignmentAnswer;
use App\Model\CreditTransaction;
use App\Model\TakenCourse;
use Illuminate\Support\Str;

class UserDashboardController extends Controller
{
    public function dashboard(Request $request)
    {
        menuSubmenu('dashboard', 'dashboard');
        $user = Auth::user();

       return view('user.userDashboard',['user'=>$user]);
    }

    public function listPackage()
    {
        menuSubmenu('package','allpackage');
        $takenPackages = TakenPackage::where('user_id', auth()->user()->id)->where('company_id', '=', null)->paginate(100);

        return view('user.package.listPackage',[
            'takenPackages' => $takenPackages,
        ]);
    }

    public function allTakenCourses()
    {
        menuSubmenu('course','allcourse');
        $takenCourses = TakenCourse::where('user_id', auth()->user()->id)->where('company_id', '=', null)->paginate(100);

        return view('user.course.listTakenCourse',[
            'takenCourses' => $takenCourses,
        ]);
    }

    public function takenPackageDetails(TakenPackage $takenPackage)
    {
        // menuSubmenu('package','allpackage');
        $levels = (explode(",",$takenPackage->course_level));
        $courses = Course::whereIn('course_level',$levels)->get();

        return view('user.package.packageDetails',[
            'courses' => $courses,
            'takenPackage' => $takenPackage,

        ]);
    }

    public function takenCourseDetails(TakenCourse $course)
    {
        menuSubmenu('package','allpackage');

        return view('user.package.takenCourseDetails',[
            'takenCourse' => $course,

        ]);
    }

    public function takenPackageCourseDetails(TakenPackage $takenPackage, TakenCourse $course)
    {
        // menuSubmenu('package','allpackage');
        $levels = (explode(",",$takenPackage->course_level));
        $courses = Course::whereIn('course_level',$levels)->get();

        return view('user.package.takenCourseDetails',[
            'takenCourse' => $course,
            'takenPackage' => $takenPackage,

        ]);
    }

    public function allTakenCourseExams()
    {
        menuSubmenu('lsbsm','examResult');
        $takenAttempts = TakenCourseExam::where('user_id',auth()->user()->id)->where('company_id', '=', null)->where('total_question', '<>', null)->latest()->paginate(50);

        return view('user.exam.allTakenCourseAttempt',[
            'takenAttempts' => $takenAttempts,

        ]);
    }
    public function takenAttemptCertificates()
    {
        menuSubmenu('lsbsm','examResult');
        $takenAttempts = TakenCourseExam::where('user_id',auth()->user()->id)->where('company_id', '=', null)->where('total_question', '<>', null)->where('certificate_file', '<>', null)->latest()->paginate(50);
        // dd($takenAttempts);
        $certificatesOnly = 1;
        return view('user.exam.allTakenCourseAttempt',[
            'takenAttempts' => $takenAttempts,
            'certificatesOnly' => $certificatesOnly,
        ]);
    }

    public function takeAttemptCourseExam(User $user, TakenCourse $takenCourse)
    {
        $isTiopic = $takenCourse->course->topics;
        $isQuestionPapers = $takenCourse->course->questionPapers;
        if ($isTiopic->count() < 1) {
            return redirect()->back()->with('error', 'No Topic found under this course!');
        }elseif($isQuestionPapers->count() < 1) {
            return redirect()->back()->with('error', 'No Question paper found under this course!');
        }else {
            $takenCourseExam = TakenCourseExam::where('user_id', auth()->user()->id)->where('subrole_id', '=', null)->where('taken_course_id', $takenCourse->id)->where('total_question', null)->first();
            if ($takenCourseExam) {
                $questionPaper = $takenCourseExam->questionPaper;
            }else{
                $firstAttempt = auth()->user()->takenCourseExams()->where('company_id', null)->first();
                $questionPaper = $takenCourse->course->questionPapers->random(1)->first();
                $takenCourseExam = TakenCourseExam::create([
                    'user_id' => auth()->user()->id,
                    'package_id' => $takenCourse->package_id,
                    'taken_package_id' => $takenCourse->taken_package_id,
                    'course_id' => $takenCourse->course_id,
                    'taken_course_id' => $takenCourse->id,
                    'attempt_started_at' => $firstAttempt ? $firstAttempt->attempt_started_at : now(),
                    'question_paper_id' => $questionPaper->id,
                    'course_from' => $takenCourse->course_from,
                ]);
            }
            return view('user.exam.takenCourseAttempt',[
                'user' => $user,
                'questionPaper' => $questionPaper,
                'takenCourse' => $takenCourse,
                'takenCourseExam' => $takenCourseExam
            ]);

        }
    }

    public function submitAttemptCourseExam(Request $request, TakenCourseExam $takenCourseExam)
    {
        if ($takenCourseExam->user_id != Auth::id()) {
            abort(401);
        }
        $questionItems= $takenCourseExam->questionPaper->items;
        foreach ($questionItems as $item) {
            $question = $item->question;
            $givenAns = CourseAnswer::where('course_question_id', $question->id)->where('correct', 1)->first();
            if ($givenAns->id == $request['question_'.$question->id]) {
                $result = 1;
            }else {
                $result = 0;
            }
            TakenCourseExamItem::create([
                'user_id' => auth()->user()->id,
                'package_id' => $takenCourseExam->package_id,
                'course_id' => $takenCourseExam->course_id,
                'taken_course_id' => $takenCourseExam->taken_course_id,
                'taken_course_exam_id' => $takenCourseExam->id,
                'course_question_id' => $question->id,
                'course_answer_id' => $request['question_'.$question->id],
                'correct' => $result,
                'question_type' => $question->question_type,
                'answer' => $givenAns->answer,
            ]);
        }
        $lastUsedCreditExam = auth()->user()->takenCourseExams()
                                        ->where('course_id',$takenCourseExam->course_id)
                                        ->where('total_question', '<>',null)
                                        ->where('company_id', '=', null)
                                        ->where('used_credit', '<>', 0)
                                        ->latest()
                                        ->first();
        
        $examTakenCourse = $takenCourseExam->takenCourse;
        $examTakenPackage = $takenCourseExam->takenPackage;
        if ($lastUsedCreditExam != null) {
                if (now()->subDays($examTakenCourse->attempt_duration) > $lastUsedCreditExam->last_attempt_started_at) {
                    $credit = $examTakenCourse->course_credit;
                }else {
                    $credit = 0;
                }
        }else{
            $credit = $takenCourseExam->takenCourse->course_credit;
        }
        if ($credit > 0 ) {
            if ($examTakenCourse->course_from == 'user_credit') {
                $checkfirstexam = auth()->user()->takenCourseExams()->where('company_id', null)->where('taken_package_id', null)->count();
                if ($checkfirstexam > 1) {
                    auth()->user()->credit = auth()->user()->credit - $credit;
                    auth()->user()->save();
                    
                    $creditTrans = new CreditTransaction;
                    $creditTrans->user_id               = auth()->user()->id;
                    $creditTrans->company_id            = null;
                    $creditTrans->company_subrole_id    = null;
                    $creditTrans->package_id            = null;
                    $creditTrans->taken_package_id      = null;
                    $creditTrans->course_id             = $takenCourseExam->course->id;
                    $creditTrans->taken_course_id       = $takenCourseExam->takenCourse->id;
                    $creditTrans->taken_course_exam_id  = $takenCourseExam->id;
                    $creditTrans->order_id              = null;
                    $creditTrans->previous_credit       = auth()->user()->credit + $credit;
                    $creditTrans->transferred_credit    = $credit;
                    $creditTrans->current_credit        = auth()->user()->credit;
                    $creditTrans->transaction_type      = 'used';
                    $creditTrans->credit_from           = 'user_credit';
                    $creditTrans->credit_for            = 'taken_exam';
                    $creditTrans->addedby_id            = auth()->user()->id;
                    $creditTrans->transaction_date      = now();
                    $creditTrans->save();
                }
            }else{
                $examTakenPackage->used_credit = $examTakenPackage->used_credit+$credit;
                $examTakenPackage->save();
                
                $creditTrans = new CreditTransaction;
                $creditTrans->user_id               = auth()->user()->id;
                $creditTrans->company_id            = null;
                $creditTrans->company_subrole_id    = null;
                $creditTrans->package_id            = $examTakenPackage->pack->id;
                $creditTrans->taken_package_id      = $examTakenPackage->id;
                $creditTrans->course_id             = $takenCourseExam->course->id;
                $creditTrans->taken_course_id       = $takenCourseExam->takenCourse->id;
                $creditTrans->taken_course_exam_id  = $takenCourseExam->id;
                $creditTrans->order_id              = null;
                $creditTrans->previous_credit       = $examTakenPackage->no_of_credits - ($examTakenPackage->used_credit - $credit);
                $creditTrans->transferred_credit    = $credit;
                $creditTrans->current_credit        = $examTakenPackage->no_of_credits - $examTakenPackage->used_credit;
                $creditTrans->transaction_type      = 'used';
                $creditTrans->credit_from           = 'user_package';
                $creditTrans->credit_for            = 'taken_exam';
                $creditTrans->addedby_id            = auth()->user()->id;
                $creditTrans->transaction_date      = now();
                $creditTrans->save();
            }
        }
        $attemptCount = auth()->user()->takenCourseExams->count();
        $correctAns = $takenCourseExam->takenCourseExamItems()->where('correct', 1)->count();
            $upCourseExamData = [
                'used_credit' => $credit,
                'no_of_attempts' => $attemptCount,
                'last_attempt_started_at' => now(),
                'total_question' => $questionItems->count(),
                'correct_answer' => $correctAns,
            ];
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


    public function courseExamAttempt(TakenCourse $takenCourse, TakenCourseExam $attempt)
    {
        $lastQuestionPaper = $attempt->questionPaper;
        return view('user.exam.takenAttemptResponse',[
            'lastQuestionPaper' => $lastQuestionPaper,
            'takenCourse' => $takenCourse,
            'takenCourseExam' => $attempt
        ]);
    }


    public function takePackageCourse(TakenPackage $takenPackage,Course $course)
    {
        $checkEnrollment = TakenCourse::where('user_id',auth()->user()->id)
            ->where('course_id',$course->id)->where('taken_package_id', $takenPackage->id)->first();
        if($checkEnrollment)
        {
            return back()->with('info','This Course Already Taken.');
        }


// attempt_started_at
// no_of_attempts
// last_attemt_started_at



        $takenCourse = new TakenCourse;

        $takenCourse->user_id = auth()->user()->id;
        $takenCourse->package_id = $takenPackage->package_id;
        $takenCourse->course_id = $course->id;
        $takenCourse->course_from = 'user_package';
        $takenCourse->course_title = $course->title;
        $takenCourse->course_credit = $course->course_credit;
        $takenCourse->attempt_duration = $course->attempt_duration;
        $takenCourse->taken_package_id = $takenPackage->id;
        $takenCourse->taken_date = Carbon::now() ;
        $takenCourse->expired_date =Carbon::now()->addDays($takenPackage->duration);
        // 1year expire date 365

        // $course->attempt_started_at = hee ;
        $takenCourse->addedby_id = auth()->user()->id;

        $takenCourse->save();

        return back()->with('success','You have taken this course successfully.');
    }

    public function editUserDetails(User $user)
    {
        menuSubmenu('user','editUserDetails');

        $user = Auth::user();
        return view('user.editUserDetails', [
            'user'=>$user
            ]);
    }

    public function productsAllOfType(Company $company, Request $request)
    {
        $type = $request->type;
        $status = $request->status ?: '';
        menuSubmenu('device', 'productsAllOfType'.$type.$status);

        $data =  $company->products()->where('status', 'active')
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
        // dd($data);
        return view('company.servicesAll',[
            'items' => $data,
            'type' =>$type,
            'status' =>$status,
            'company'=>$company
        ]);
    }

    public function onlineServicesAll(Company $company, Request $request)
    {
        menuSubmenu('dashboard', 'onlineServicesAll');

       return view('company.servicesAll',[
            'company'=>$company,
            'items' => $company->products()
            ->where('status', 'active')
            ->where('location_offline', 0)
            ->paginate(20)
        ]);

    }

    public function offlineServicesAll(Company $company, Request $request)
    {
        menuSubmenu('dashboard', 'offlineServicesAll');

       return view('company.servicesAll',[
            'company'=>$company,
            'items' => $company->products()
            ->where('status', 'active')
            ->where('location_offline', 1)
            ->paginate(20)
        ]);
    }

    public function productStatus(Company $company, Request $request)
    {


        $url = "http://fdapp.18gps.net//GetDateServices.asmx/GetDate?method=BMSrealTimeState&mds={$company->mds}&macid={$request->macid}&_r={time()}";
        // dd($url);
        $client = new Client();

        try {
                $r = $client->request('GET', $url);
                $result = $r->getBody()->getContents();

                $arr = json_decode($result, true);

                if($arr['success'] == 'true')
                {
                    $data = $arr['data'][0];
                    $state = json_decode($data['State'], true);

                    // $setting = json_decode($data['Seting'], true);
                    // dd(array_keys($state));





                }else
                {
                    if($request->ajax())
                    {

                      return Response()->json([
                        'view'=>View('company.includes.modals.productStatusModalLg', [
                        'company' => null,
                        'state' => null,
                        'macid' => $request->macid,
                        'platenumber' => $request->platenumber
                        ])->render(),
                        'success' => false,
                      ]);
                    }

                }

            } catch (\GuzzleHttp\Exception\ConnectException $e) {
                // This is will catch all connection timeouts
                // Handle accordinly
            } catch (\GuzzleHttp\Exception\ClientException $e) {
                // This will catch all 400 level errors.
                // return $e->getResponse()->getStatusCode();
            }

            if($request->ajax())
            {


              return Response()->json([
                'view'=>View('company.includes.modals.productStatusModalLg', [
                'company' => $company,
                'state' => $state,
                'macid' => $request->macid,
                'platenumber' => $request->platenumber
                ])->render(),

                'success' => $arr['success'] == 'true' ? true : false,
              ]);
            }

            return back();


    }

    public function productSettings(Company $company, Request $request)
    {


        $url = "http://fdapp.18gps.net//GetDateServices.asmx/GetDate?method=BMSrealTimeState&mds={$company->mds}&macid={$request->macid}&_r={time()}";
        // dd($url);
        $client = new Client();

        try {
                $r = $client->request('GET', $url);
                $result = $r->getBody()->getContents();

                $arr = json_decode($result, true);

                if($arr['success'] == 'true')
                {
                    $data = $arr['data'][0];

                    $setting = json_decode($data['Seting'], true);

                    // dd(array_keys($setting));


                }else
                {
                    if($request->ajax())
                    {

                      return Response()->json([
                        'view'=>View('company.includes.modals.productSettingsModalLg', [
                        'company' => null,
                        'setting' => null,
                        'macid' => $request->macid,
                        'platenumber' => $request->platenumber
                        ])->render(),
                        'success' => false,
                      ]);
                    }

                }

            } catch (\GuzzleHttp\Exception\ConnectException $e) {
                // This is will catch all connection timeouts
                // Handle accordinly
            } catch (\GuzzleHttp\Exception\ClientException $e) {
                // This will catch all 400 level errors.
                // return $e->getResponse()->getStatusCode();
            }

            if($request->ajax())
            {


              return Response()->json([
                'view'=>View('company.includes.modals.productSettingsModalLg', [
                'company' => $company,
                'setting' => $setting,
                'macid' => $request->macid,
                'platenumber' => $request->platenumber
                ])->render(),

                'success' => $arr['success'] == 'true' ? true : false,
              ]);
            }

            return back();


    }

    public function productVersion(Company $company, Request $request)
    {


        $url = "http://fdapp.18gps.net//GetDateServices.asmx/GetDate?method=GetBmsSNInfo&mds={$company->mds}&Macid={$request->macid}&Key=BMS_Version&_r={time()}";
        $client = new Client();

        try {
                $r = $client->request('GET', $url);
                $result = $r->getBody()->getContents();

                $arr = json_decode($result, true);
                // dd($arr);


                if($arr['success'] == 'true')
                {
                    $data = json_decode($arr['data'][0], true);

                    // dd(array_keys($data));
                }else
                {
                    if($request->ajax())
                    {

                      return Response()->json([
                        'view'=>View('company.includes.modals.productVersionModalLg', [
                        'company' => null,
                        'data' => null,
                        'macid' => $request->macid,
                        'platenumber' => $request->platenumber
                        ])->render(),
                        'success' => false,
                      ]);
                    }

                }

            } catch (\GuzzleHttp\Exception\ConnectException $e) {
                // This is will catch all connection timeouts
                // Handle accordinly
            } catch (\GuzzleHttp\Exception\ClientException $e) {
                // This will catch all 400 level errors.
                // return $e->getResponse()->getStatusCode();
            }

            if($request->ajax())
            {


              return Response()->json([
                'view'=>View('company.includes.modals.productVersionModalLg', [
                'company' => $company,
                'data' => $data,
                'macid' => $request->macid,
                'platenumber' => $request->platenumber
                ])->render(),

                'success' => $arr['success'] == 'true' ? true : false,
              ]);
            }

            return back();
    }


    public function companyDetails(Company $company)
    {
        menuSubmenu('company', 'companyDetails');



        return view('company.companyDetails',['company'=>$company]);



    }

    public function companyDetailsUpdate(Company $company, Request $request)
    {
        menuSubmenu('company', 'companyDetailsUpdate');
        return view('company.companyDetailsUpdate',['company'=>$company]);
    }

    public function companyDetailsUpdatePost(Company $company, Request $request)
    {
        $validation = Validator::make($request->all(),
        [
            'title' => ['required', 'string', 'max:255','min:3'],
            'description' => ['required', 'string', 'max:255'],
            // 'login_code' => ['required', 'string'],
            // 'login_password' => ['required','string'],
            // 'login_type' => ['required'],
            'mobile' => ['nullable'],
            'email' => ['nullable'],
            'address' => ['nullable'],
            'zip_code' => ['nullable'],
            'city' => ['nullable'],
            // 'status' => ['nullable'],
            'country' => ['required'],

        ]);

        if($validation->fails())
        {

            return back()
            ->withInput()
            ->withErrors($validation);
        }

$company->title = $request->title ?: $company->title;
$company->description = $request->description ?: null;
$company->company_code = $request->company_code ?: $company->company_code;
// $company->login_password = $request->login_password ?: $company->login_password;
// $company->login_type = $request->login_type ?: $company->login_type;
$company->mobile = $request->mobile ?: $company->mobile;
$company->email = $request->email ?: $company->email;
$company->address = $request->address ?: $company->address;
$company->zip_code = $request->zip_code ?: $company->zip_code;
$company->city = $request->city ?: $company->city;
$company->country = $request->country ?: $company->country;
// $company->status = $request->status ? 'active' : 'inactive';
$company->editedby_id = Auth::id();




        if($request->hasFile('logo'))
        {
            $cp = $request->file('logo');
            $extension = strtolower($cp->getClientOriginalExtension());
            $randomFileName = $company->id.'_logo_'.date('Y_m_d_his').'_'.rand(10000000,99999999).'.'.$extension;

            #delete old rows of profilepic
            Storage::disk('upload')->put('company/logo/'.$randomFileName, File::get($cp));

            if($company->logo_name)
            {
                $f = 'company/logo/'.$company->logo_name;
                if(Storage::disk('upload')->exists($f))
                {
                    Storage::disk('upload')->delete($f);
                }
            }

            $company->logo_name = $randomFileName;
        }

        $company->save();

        return redirect()->route('company.companyDetailsUpdate', $company)->with('success', 'Company successfully updated.');
    }

    public function updateUserDetails(User $user, Request $request)
    {
        $validation = Validator::make($request->all(),
        [
            'name' => ['required', 'string', 'max:255','min:3'],
            'email' => ['required', 'string','email', 'max:255'],
            'mobile' => ['required', 'string'],
            'image' => ['image'],
        ]);

        if($validation->fails())
        {
            return back()
            ->withInput()
            ->withErrors($validation);
        }

        // $user = Auth::user();

        // dd($request->all());

        $user->name = $request->name ?: $user->name;
        $user->email = $request->email ?: $user->email;
        $user->mobile = $request->mobile ?: $user->mobile;

        $user->editedby_id = Auth::id();

        if($request->hasFile('image'))
        {
            $cp = $request->file('image');
            $extension = strtolower($cp->getClientOriginalExtension());
            $randomFileName = $user->id.'_fi_'.date('Y_m_d_his').'_'.rand(10000000,99999999).'.'.$extension;

            #delete old rows of profilepic
            Storage::disk('upload')->put('user/'.$randomFileName, File::get($cp));   
            
            if($user->image_name)
            {
                $f = 'user/'.$user->image_name;
                if(Storage::disk('upload')->exists($f))
                {
                    Storage::disk('upload')->delete($f);
                }
            }          

            $user->image_name = $randomFileName;
        }
        
        $user->save();

        return back()->with('success', 'User successfully Updated');

    }

    public function editUserPassword(User $user)
    {
        menuSubmenu('user', 'editUserPassword');
        $user = Auth::user();
        return view('user.editUserPassword',['user'=> $user]);
    }

    public function updateUserPassword(User $user, Request $request)
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

    public function filterData(Company $company, Request $request)
    {
        $type = $request->type ? : '';

        menuSubmenu('dataMonitor', 'dataFilter'.$type);
        return view('company.productFilter',[
            'company' => $company,
            'type' => $type
        ]);
    }



    public function productsAllActivities(Company $company, Request $request)
    {

        $type = $request->type ?: '';

        menuSubmenu('dataMonitor', 'productsAllActivities'.$type);

        return view('company.productsAllActivities',[

            'company' => $company,
            'type' => $type,

            'settingDatas' => $company->productSettingDatas()
            ->whereHas("product",function($qq) use ($type)
            {
                if($type == "battery"){
                    $qq->where('type',$type);
                }
                elseif($type == "rectifier"){
                    $qq->where('type',$type);
                }

            })

            ->with('productData','productLocationData','productRectData','product')->latest()->paginate(15)
        ]);
    }

    public function singleDeviceAllData(Company $company, Request $request)
    {
        $type = $request->type;
        $product = Product::where('id', $request->product)->first();

        // dd($product);

        if($product)
        {
           // $settingDatas = $product->productSettingDatas()
           // ->with('productData','productLocationData')
           // ->latest()
           // ->paginate(15);

           // return view('company.singleDeviceAllData', [

           //  'product' => $product,
           //  'settingDatas' => $settingDatas,
           //  'company' =>$company
           // ]);

           return view('company.productsAllActivities',[

            'company' => $company,
            'type' => $type,

            'settingDatas' => $company->productSettingDatas()->where('product_id', $product->id)
            ->whereHas("product",function($qq) use ($type)
            {
                if($type == "battery"){
                    $qq->where('type',$type);
                }
                elseif($type == "rectifier"){
                    $qq->where('type',$type);
                }

            })

            ->with('productData','productLocationData','productRectData','product')->latest()->paginate(25)
        ]);


        }

        return back();
    }

    public function singleDeviceAlarmData(Company $company, Request $request)
    {
        $product = Product::where('macid', $request->macid)->first();

        if($product)
        {
            $datas = $product->productAlarmDatas()->latest()->paginate(5);
            return view('company.singleAlarmData',[
                'company'=>$company,
                'datas' => $datas
                ]);
        }

        return back();
    }

    public function singleDeviceMap(Company $company, Request $request)
    {
        $products = Product::where('macid', $request->macid)->first();

        // $datas = $product->productLocationDatas()->latest()->paginate(2);
        // dd($datas);
        $product = $products->productLocationDatas()->latest()->first();

        if($product)
        {
            return view('company.singleDeviceMapLocation',[
               'product' => $product,
                'company' => $company
            ]);
        }
        Session::flash('message', "Device Location Not Found");
        return back();
    }


    public function alarmsAll(Company $company)
    {
        menuSubmenu('alarmData','alarmsAll');

        $datas = $company->productAlarmDatas()
        ->where('hide', 0)
        ->orderBy('send_time','desc')
        ->latest()
        ->paginate(15);

        return view('company.alarmsAll',[
            'company'=>$company,
            'datas' => $datas
            ]);
    }

    public function productEdit(Company $company, Product $device)
    {
        return view('company.productEdit',['company'=>$company, 'product'=>$device]);
    }

    public function productUpdate(Company $company, Product $device, Request $request)
    {

        $validation = Validator::make($request->all(),
        [
            'title' => ['required', 'string', 'max:255','min:3'],
            // 'description' => ['required', 'string', 'max:255'],
            // 'login_code' => ['required', 'string'],
            // 'login_password' => ['required','string'],
            // 'login_type' => ['required'],

        ]);

        if($validation->fails())
        {

            return back()
            ->withInput()
            ->withErrors($validation);
        }

        $device->title = $request->title;
        $device->region = $request->region;
        $device->zone = $request->zone;
        $device->cluster = $request->cluster;
        $device->platenumber = $request->platenumber;
        $device->model = $request->model;
        $device->description = $request->description;
        $device->force_inactive = $request->force_inactive ? 0 : 1 ;
        $device->iccid = $request->iccid;
        $device->editedby_id = Auth::id();
        $device->save();

        return back()->with('success', 'Device successfully updated.');
    }

    public function singleDeviceSingleDataDetails(Company $company, ProductSettingData $data)
    {
        $alarms = $company->productAlarmDatas()
        ->where('macid',$data->macid)
        ->where('hide', 0)
        ->orderBy('send_time','desc')
        ->latest()
        ->paginate(50);

        return view('company.singleDeviceSingleDataDetails',[
            'company'=>$company,
            'sd'=>$data,
            'product'=> $data->product,
            'alarmData' => $alarms,
            // 'rectifires' => $rectifire
        ]);
    }

    public function deviceSearch(Company $company, Request $request)
    {
        $q = $request->q;
        $items = Product::where(function($query) use ($q){
            $query->where('macid', 'like', "%{$q}%");
            $query->orWhere('title', 'like', "%{$q}%");
            $query->orWhere('region', 'like', "%{$q}%");
            $query->orWhere('zone', 'like', "%{$q}%");
        })->where('company_id', $company->id)->paginate(20);

        return view('company.deviceSearch', [
            'company'=>$company,
            'q'=>$request->q,
            'items' => $items

        ]);
    }

    public function searchAll(Company $company, Request $request)
    {
        $type = $request->type;
        $fromDate = $request->from ?: date('Y-m-d');
        $toDate = $request->to ?: date('Y-m-d');
        $macids = $request->macids;
        $page = $request->pages ?: 20;

        $items = $company->productSettingDatas()
        ->whereBetween('created_at', [$fromDate." 00:00:00",$toDate." 23:59:59"])
        ->where(function($query) use ($macids)
        {
            if($macids)
            {
                $query->whereIn('macid', $macids);
            }

        })
        ->whereHas('product',function($q) use ($type){
            if($type=='battery')
            {
                $q->where('type',$type);
            }elseif($type=='rectifier'){
                $q->where('type',$type);
            }
        })
        ->latest()
        ->paginate($page);

        // dd($items);

        return view('company.productFilterSearch',[
            'company' => $company,
            'items' => $items,
            'filter' => $request->filter ?: [],
            'macids' => $request->macids ?: [],
            'from' =>$fromDate,
            'to' =>$toDate,
            'pages' => $page,
            'type' => $request->type

        ]);
    }

    public function seenupdated(Company $company, $id)
    {
        $value = ProductAlarmData::find($id);
        $value->seen = true;
        $value->save();
        return redirect()->back();
    }
    public function hideupdated(Company $company, $id)
    {

        $value = ProductAlarmData::find($id);
        $value->hide = 1;
        $value->save();
        return back();
    }

    public function alarmDataFilter(Company $company, Request $request)
    {
        menuSubmenu('alarmData', 'alarmDataFilter');
        return view('company.alarmFilter',[
            'company' => $company,
        ]);
    }

    public function searchAllAlarm(Company $company, Request $request)
    {

        $fromDate = $request->from ?: date('Y-m-d');
        $toDate = $request->to ?: date('Y-m-d');

        $fDate = strtotime($fromDate)*1000;
        $tDate = strtotime($toDate)*1000;

        $macids = $request->macids;
        $page = $request->pages ?: 20;


        $items = $company->productAlarmDatas()
        ->whereBetween('send_time', [$fDate,$tDate])
        ->where(function($query) use ($macids)
        {
            if($macids)
            {
                $query->whereIn('macid', $macids);
            }

        })
        ->latest()
        ->paginate($page);

        return view('company.alarmFilterSearch',[
            'company' => $company,
            'items' => $items,
            'macids' => $request->macids ?: [],
            'filter' => $request->filter ?: [],
            'from' =>$fromDate,
            'to' =>$toDate,
            'pages' => $page

        ]);
    }

    //subrole start
    public function newSubrole(Company $company)
    {
        menuSubmenu('role', 'newSubrole');

        $subrole = CompanySubrole::where('company_id', $company->id)
        ->where('status', 'temp')->where('addedby_id', Auth::id())->first();
        if(!$subrole)
        {
            $subrole = new CompanySubrole;
            $subrole->addedby_id = Auth::id();
            $subrole->company_id = $company->id;
            $subrole->save();
        }

        return view('company.newSubrole',[
            'company'=>$company,
            'subrole'=>$subrole
        ]);
    }

    public function subroleUserAdd(Company $company, CompanySubrole $subrole, Request $request)
    {
        $user = User::where('active', true)->where('id', $request->user)->first();

            if($user)
            {
                $subrole->user_id = $user->id;
                $subrole->save();

                if($request->ajax())
                {
                  return Response()->json([

                    'success' => true

                  ]);
                }
            }

            if($request->ajax())
            {
              return Response()->json([

                'success' => false

              ]);
            }

            return back();
    }

    public function newUserCreate(Company $company)
    {
        menuSubmenu('dashboard','newUserCreate');

        return  view('company.newUserCreate',['company'=>$company]);
    }

    public function subroleUpdate(Company $company, CompanySubrole $subrole, Request $request)
    {
        // dd($request->all());
        $subrole->title = $request->title;
        // $subrole->zone = $request->zone;
        $subrole->status = $request->status ? 'active' : 'inactive';
        $subrole->save();

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


    public function newUserCreatePost(Company $company, Request $request)
    {
        $validation = Validator::make($request->all(),
        [
            'name' => ['required', 'string', 'max:255','min:3'],
            'email' => ['required', 'string','email', 'unique:users', 'max:255'],
            'mobile' => ['required', 'string'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'active'=> ['nullable']

        ]);

        if($validation->fails())
        {

            return back()
            ->withInput()
            ->withErrors($validation);
        }

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->mobile = $request->mobile;
        $user->password = $request->password ? Hash::make($request->password) : $user->password;
        $user->active = $request->active ? true : false;

        $user->addedby_id = Auth::id();
        $user->save();

        return back()->with('success', 'New user successfully created');




    }

    public function allSubroles(Company $company)
    {
        menuSubmenu('role', 'allSubroles');
        $subroles = CompanySubrole::where('company_id', $company->id)->where('status', '<>', 'temp')->orderBy('title')->latest()->paginate(20);

        return view('company.allSubroles',['company'=>$company, 'subroles'=>$subroles]);
    }

    public function subroleEdit(Company $company, CompanySubrole $subrole)
    {
        return view('company.subroleEdit', ['company'=>$company,'subrole'=>$subrole]);
    }

    public function subroleDelete(Company $company, CompanySubrole $subrole)
    {
        $subrole->items()->delete();
        $subrole->delete();
        return back()->with('success', 'Role successfully deleted');
    }
    
    public function creditHistory()
    {
        $creditHistory = auth()->user()->creditHistory()->where('company_id', null)->latest()->paginate(50);
        return view('user.creditHistory', compact('creditHistory'));
    }
    // assign submit
    public function submitAssignment(TakenCourse $takenCourse, CourseAssignment $assignment)
    {
        return view('user.course.submitAssignment',[
            'takenCourse' => $takenCourse,
            'assignment' => $assignment,
        ]);
    }

    public function submitAssignmentPost(TakenCourse $takenCourse, CourseAssignment $assignment, Request $request)
    {
        $validated = $request->validate([
            'answer' => 'required',
        ]);
        $ans = new CourseAssignmentAnswer;
        $ans->course_assignment_id = $assignment->id;
        $ans->course_id = $assignment->course_id;
        $ans->user_id = auth()->user()->id;
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

        return redirect()->route('user.allTakenCourses', [$takenCourse])->with('success', 'Your Assignment has been submitted successfully!');
    }
}
