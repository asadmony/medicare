<?php

namespace App\Http\Controllers\Company;

use Mail;
use Auth;
use Hash;
use DB;
use Session;
use Validator;
use Carbon\Carbon;
use App\Model\User;
use App\Model\Company;
use GuzzleHttp\Client;
use App\Model\Product;
use App\Model\TakenPackage;
use App\Model\TakenCourse;
use App\Model\TakenCourseExam;
use App\Model\TakenPackageUser;
use App\Model\SubroleItem;
use Illuminate\Http\Request;
use App\Model\CompanySubrole;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;
use App\Model\Course;
use App\Model\CreditTransaction;
use App\Model\Message;
use App\Model\ProductAlarmData;
use App\Model\ProductSettingData;
use Illuminate\Support\Facades\Storage;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\Hash as FacadesHash;
use Illuminate\Support\Facades\Mail as FacadesMail;

class CompanyDashboardController extends Controller
{
    public function dashboard(Company $company, Request $request)
    {
        menuSubmenu('dashboard', 'dashboard');
        $memberCount = CompanySubrole::where('company_id', $company->id)->where('title', 'member')->count();
        $assessorCount = CompanySubrole::where('company_id', $company->id)->where('title', 'assessor')->count();
        $administratorCount = CompanySubrole::where('company_id', $company->id)->where('title', 'administrator')->count();

       return view('company.companyDashboard',[
           'company'=>$company,
           'memberCount'=>$memberCount,
           'assessorCount'=>$assessorCount,
           'administratorCount'=>$administratorCount,
           ]);
    }
    public function messages(Company $company){
        menuSubmenu('Messages', 'Messages');
        $messageFrom = auth()->user();
        $conversations = auth()->user()->messageContacts();
        if ($conversations->count() > 0) {
            $messageTo = User::find($conversations[0]->userto_id);
            $conversation = $conversations[0]->conversation($conversations[0]->userto_id,$conversations[0]->userfrom_id);
        }else{
            $messageTo = null;
            $conversation = null;
        }
        return view('company.message', 
        compact(
            'company',
            'messageFrom',
            'messageTo',
            'conversations',
            'conversation'
        ));
    }
    public function allMessages(Company $company){
        menuSubmenu('lsbm', 'comMessages');
        $messageFrom = auth()->user();
        $conversations = $company->messages();
        if ($conversations->count() > 0) {
            $messageTo = User::find($conversations[0]->userto_id);
            $conversation = $conversations[0]->conversation($conversations[0]->userto_id,$conversations[0]->userfrom_id);
        }else{
            $messageTo = null;
            $conversation = null;
        }
        $isCompanyMessages = true;
        return view('company.message', compact('company','messageFrom','messageTo', 'conversations', 'conversation', 'isCompanyMessages'));
    }
    public function message(Company $company, User $messageTo){
        menuSubmenu('lsbm','Messages');
        $messageFrom = auth()->user();
        if($messageFrom->id == $messageTo->id)
        {
            abort(401);
        }

        $conversation = auth()->user()->messageWithUser($messageTo);
        $conversations = auth()->user()->messageContacts();


        return view('company.message', compact('company','messageFrom', 'messageTo', 'conversation', 'conversations'));
    }
    public function compMessage(Company $company, User $messageFrom, User $messageTo, Message $message){
        menuSubmenu('lsbm','CompanyMessage');

        $conversation = $message->conversation($messageTo->id,$messageFrom->id);
        $conversations = $company->messages();

        $isCompanyMessages = true;

        return view('company.message', compact('company','messageFrom','messageTo', 'conversations', 'conversation', 'isCompanyMessages'));
    }

    public function allPackages(Company $company)
    {
        menuSubmenu('package', 'allpackages');

        $packages = $company->takenpackages()->latest()->paginate(20);
        // dd($packages);

        return view('company.package.listPackage',[
            'company' => $company,
            'packages' => $packages
        ]);
    }

    public function allTakenCourses(Company $company)
    {
        menuSubmenu('course', 'allcourses');

        $allTakenCourses = $company->takenCourses()->groupBy('course_id')->latest()->paginate(20);
        // dd($packages);

        return view('company.course.allTakenCourses',[
            'company' => $company,
            'allTakenCourses' => $allTakenCourses
        ]);
    }

    public function courseDetails(Company $company, TakenCourse $takenCourse)
    {
        return view('company.course.courseDetails',[
            'company' => $company,
            'takenCourse' => $takenCourse
        ]);
    }

    public function takenCourseUsers(Company $company, TakenCourse $takenCourse)
    {
        $takenCourseUsers = $company->takenCourses()->where('course_id', $takenCourse->course_id)->latest()->paginate(200);

        return view('company.course.takenCourseUsers',[
            'company' => $company,
            'takenCourse' => $takenCourse,
            'takenCourseUsers' => $takenCourseUsers
        ]);
    }

    public function takenAttempts(Company $company)
    {
        menuSubmenu('exam', 'examResult');
        $takenAttempts = $company->courseExams()->where('total_question', '<>', null)->latest()->paginate(200);
        return view('company.exam.allTakenExamAttempt',[
            'company' => $company,
            'takenAttempts' => $takenAttempts,

        ]);
    }

    public function allCertificates(Company $company)
    {
        menuSubmenu('lsbsm', 'certificates');
        $takenAttempts = $company->courseExams()->where('total_question', '<>', null)->where('certificate_file', '<>', null)->latest()->paginate(200);
        $certificatesOnly = 1;
        return view('company.exam.allTakenExamAttempt',[
            'company' => $company,
            'takenAttempts' => $takenAttempts,
            'certificatesOnly' => $certificatesOnly,

        ]);
    }

    public function takenCourseAttempts(Company $company, TakenCourse $takenCourse)
    {
        menuSubmenu('lsbsm', 'examResult');
        $takenAttempts = $company->courseExams()->where('course_id', $takenCourse->course_id)->where('total_question', '<>', null)->latest()->paginate(200);

        return view('company.exam.allTakenExamAttempt',[
            'company' => $company,
            'takenAttempts' => $takenAttempts,
            'takenCourse' => $takenCourse
        ]);
    }
    public function takenPackageCompanyAttempts(Company $company, TakenPackage $takenPackage)
    {
        menuSubmenu('exam', 'examResult');
        $takenAttempts = $company->courseExams()->where('taken_package_id', $takenPackage->id)->where('total_question', '<>', null)->latest()->paginate(200);

        return view('company.exam.allTakenExamAttempt',[
            'company' => $company,
            'takenAttempts' => $takenAttempts,
            'takenPackage' => $takenPackage
        ]);
    }

    public function courseExamAttemptDetails(Company $company, TakenCourseExam $takenAttempt)
    {
        menuSubmenu('exam', 'examResult');

        return view('company.exam.attemptDetails',[
            'company' => $company,
            'takenCourseExam' => $takenAttempt
        ]);
    }


    public function subroleExamAttempts(Company $company, CompanySubrole $subrole)
    {
        menuSubmenu('exam', 'examResult');
        $takenAttempts = $company->courseExams()->where('subrole_id', $subrole->id)->where('total_question', '<>', null)->latest()->paginate(200);

        return view('company.exam.allTakenExamAttempt',[
            'company' => $company,
            'subrole' => $subrole,
            'takenAttempts' => $takenAttempts,

        ]);
    }


    public function subroleTakenCourse(Company $company, CompanySubrole $subrole)
    {
        menuSubmenu('exam', 'examResult');
        $userTakenCourses  = $company->takenCourses()->where('subrole_id', $subrole->id)->latest()->paginate(200);

        return view('company.course.subroleTakenCourses',[
            'company' => $company,
            'role' => $subrole,
            'userTakenCourses' => $userTakenCourses ,

        ]);
    }


    public function packageDetails(Company $company, TakenPackage $takenpackage)
    {
        menuSubmenu('package', 'allpackages');

        $subroles = $company->subroles()->pluck('user_id');
        $packId = $takenpackage->package_id;
        $users  = User::whereIn('id',$subroles)->get();

        $takenUsers = $takenpackage->packageUsers()->get();
            // $companySubrolesId= array();
            // $companySubroles = CompanySubrole::where('company_id', $company->id)->get();
            // foreach ($companySubroles as $subrole) {
            //     array_push($companySubrolesId, $subrole->id );
            // }
        // dd($companySubrolesId);
        $takenCoursesByUsers = $takenpackage->takenCourses()->groupby('course_id')->get();
        // dd($takenCoursesByUsers);
        $takenExamsByUsers = TakenCourseExam::where('company_id', $takenpackage->company_id)->where('taken_package_id', $takenpackage->id)->where('total_question', '<>', null)->with('course', 'user', 'takenCourseExamItems')->get();
        $creditHistory = CreditTransaction::where('company_id', $company->id)->where('taken_package_id', $takenpackage->id)->latest()->paginate(50);
        return view('company.package.packageDetails',[
            'company' => $company,
            'takenpackage' => $takenpackage,
            'users' => $users,
            'takenUsers' => $takenUsers,
            'takenCoursesByUsers' => $takenCoursesByUsers,
            'takenExamsByUsers' => $takenExamsByUsers,
            'creditHistory' => $creditHistory,
        ]);
    }

    public function takenPackageCompanyUsers(Company $company, TakenPackage $takenPackage)
    {
        menuSubmenu('package', 'allpackages');
        $takenCourses = $company->takenPackageSubroles()->where('taken_package_id', $takenPackage->id)->latest()->paginate(200);

        return view('company.course.takenCourseUsers',[
            'company' => $company,
            'takenPackage' => $takenPackage,
            'takenCourseUsers' => $takenCourses
        ]);
    }

    public function userEnrolledinTakenPackage(Company $company, TakenPackage $takenpackage)
    {
        $request = request();
        $users = $request->user;

        $oldUsers = TakenPackageUser::where('company_id', $company->id)
        ->where('taken_package_id', $takenpackage->id)
        ->whereIn('user_id', $users)
        ->pluck('user_id')->toArray();


        $newusers = array_diff($users, $oldUsers);

        $check = 0;
        foreach($newusers as $userId)
        {
            $csi = CompanySubrole::where('company_id',$company->id)->where('user_id', $userId)->value('id');

            $takePackUsers = new TakenPackageUser;
            $takePackUsers->user_id = $userId;
            $takePackUsers->company_id = $company->id;
            $takePackUsers->company_subrole_id = $csi;
            $takePackUsers->package_id = $takenpackage->pack->id;
            $takePackUsers->taken_package_id = $takenpackage->id;
            $takePackUsers->save();

            $check++;
        }

        if($check == 0)
        {
            return back()->with('info', 'User already enrolled');
        }

        return back()->with('success','Users successfully attached to this package');
    }

    public function servicesAll(Company $company, Request $request)
    {
        menuSubmenu('device', 'servicesAll');



        // $url = "http://fdapp.18gps.net//GetDateServices.asmx/GetDate?method=GetTemporaryData&mds={$company->mds}&macid=027023279763&key=MAC2600_InfoDict";

        // $client = new Client();

        // try {
        //         $r = $client->request('GET', $url);
        //         $result = $r->getBody()->getContents();
        //         $arr = json_decode($result, true);
        //         $object = (object)$arr;

        //         $d = $arr['data'][0];

        //         $e  = json_decode($d['Data'], true);

        //         dd($e);
        //         $l = 0;
        //         foreach($e['dc_InfoList'][0]['dcBetteryAList'] as $key => $line)
        //         {
        //             $l++;
        //             // dd($key);
        //             dd($line['acInLineAV']);
        //         }
        //         // dd($key);
        //         // dd($l);
        //     } catch (\GuzzleHttp\Exception\ConnectException $e) {
        //     } catch (\GuzzleHttp\Exception\ClientException $e) {
        //     }


###############################################
        //      $url = "http://fdapp.18gps.net//GetDateServices.asmx/GetDate?method=GetTemporaryData&mds={$company->mds}&macid=027023279763&key=MC2600_RectificationDict";

        // $client = new Client();

        // try {
        //         $r = $client->request('GET', $url);
        //         $result = $r->getBody()->getContents();
        //         $arr = json_decode($result, true);
        //         $object = (object)$arr;

        //         $d = $arr['data'][0];

        //         // dd($arr);

        //         $e  = json_decode($d['Data'], true);

        //         dd($e);

        //         dd($e['rectifierInfo']);

        //         dd($e['rectifierInfo']['DeviceType']);

        //     } catch (\GuzzleHttp\Exception\ConnectException $e) {
        //     } catch (\GuzzleHttp\Exception\ClientException $e) {
        //     }
####################################################

        //      $url = "http://fdapp.18gps.net//GetDateServices.asmx/GetDate?method=GetTemporaryData&mds={$company->mds}&macid=027023279763&key=MAC2600_SettingDict";

        // $client = new Client();

        // try {
        //         $r = $client->request('GET', $url);
        //         $result = $r->getBody()->getContents();
        //         $arr = json_decode($result, true);
        //         $object = (object)$arr;

        //         $d = $arr['data'][0];

        //         // dd($d);

        //         $e  = json_decode($d['Data'], true);

        //         dd($e);

        //         // dd($e['dc_Setting']['updateTime']);

        //         $l = 0;
        //         foreach($e['dc_Setting']['dcASUDefValList'] as $key => $line)
        //         {
        //             $l++;
        //             // dd($key);
        //             dd($line);
        //         }


        //     } catch (\GuzzleHttp\Exception\ConnectException $e) {
        //     } catch (\GuzzleHttp\Exception\ClientException $e) {
        //     }

####################################################
             // $url = "http://fdapp.18gps.net//GetDateServices.asmx/GetDate?method=GetTemporaryData&mds={$company->mds}&macid=027023279763&key=MAC2600_InfoDict";
        //      $url = "http://fdapp.18gps.net//GetDateServices.asmx/GetDate?method=SendCommands&macid=027023279763&cmd=BMS_REFRESH&param=&pwd=&sendTime=&mds={$company->mds}";

        // $client = new Client();

        // try {
        //         $r = $client->request('GET', $url);
        //         $result = $r->getBody()->getContents();
        //         $arr = json_decode($result, true);
        //         $object = (object)$arr;

        //         $d = $arr['data'][0];

        //         dd($arr);

        //         $e  = json_decode($d['Data'], true);

        //         dd($e);

        //     } catch (\GuzzleHttp\Exception\ConnectException $e) {
        //     } catch (\GuzzleHttp\Exception\ClientException $e) {
        //     }


       return view('company.servicesAll',[
            'company'=>$company,
            'items' => $company->products()
            ->where('status', 'active')
            ->paginate(20)
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


    public function editUserDetails(Company $company)
    {
        menuSubmenu('role', 'editUserDetails');
        $user = Auth::user();
        return view('company.editUserDetails', ['user'=>$user, 'company'=>$company]);
    }

    public function updateUserDetails(Company $company, Request $request)
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

    public function editUserPassword(Company $company)
    {
         menuSubmenu('role', 'editUserPassword');
        $user = Auth::user();
        return view('company.editUserPassword',['company'=>$company, 'user'=> $user]);
    }

    public function updateUserPassword(Company $company, Request $request)
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

                $aa = CompanySubrole::where('user_id', $user->id)->where('company_id', $company->id)->first();


                if($aa)
                {
                    if($request->ajax())
                    {
                    return Response()->json([

                        'success' => false

                    ]);
                    }

                }else
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
        if (!$request->level) {
            $level = [];
        }
        else{
            $level = $request->level;
        }
        if($request->title == 'administrator'){
            $level = ["1","2","3","4","5","6","7","8"];
        }
        $subrole->title = $request->title;
        $subrole->level = implode(",",$level);
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
            // 'password' => ['required', 'string', 'min:6', 'confirmed'],
            // 'active'=> ['nullable']

        ]);

        if($validation->fails())
        {
            return back()
            ->withInput()
            ->withErrors($validation);
        }

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

        $mail = mail($user->email, "{$company->title} invited you to join {$_SERVER['SERVER_NAME']}", 'donotreply@medicare.com', "Dear {$user->name}, join {$_SERVER['SERVER_NAME']}. Your credentials are email: {$user->email} , password: {$pass} . Please, login {$_SERVER['SERVER_NAME']} and change your password.");

        return back()->with('success', 'Invitation successfully sent');




    }

    public function allSubroles(Company $company)
    {
        $type =request()->type;
        
            menuSubmenu('role', 'allSubroles'.$type);
            $subroles = CompanySubrole::where('company_id', $company->id)->where('title', $type)->where('status', '<>', 'temp')->latest()->paginate(20);
        
        return view('company.allSubroles',[
            'company'=>$company, 
            'subroles'=>$subroles,
            'type'=>$type,
            ]);
    }

    public function courseMatrix(Company $company)
    {
        menuSubmenu('courseMatrix', 'courseMatrix');
        $levels = $company->packageCourseLevels();
        $courses = Course::where('status', '<>', 'temp')
        ->whereIn('course_level', $levels)
        ->groupBy('id')
        ->latest()
        ->get();
        // $takenCourses = $company->takenCourses()->groupBy('course_id')->latest()->get();
        $subroles = CompanySubrole::where('company_id', $company->id)->where('status', '=', 'active')->latest()->get();

        return view('company.courseMatrix',compact('company','courses','subroles'));
    }

    public function subroleEdit(Company $company, CompanySubrole $subrole)
    {
        return view('company.subroleEdit', ['company'=>$company,'subrole'=>$subrole]);
    }

    public function subroleDelete(Company $company, CompanySubrole $subrole)
    {
        // $subrole->items()->delete();
        $subrole->delete();
        return back()->with('success', 'Role successfully deleted');
    }
    //subrole end
}
