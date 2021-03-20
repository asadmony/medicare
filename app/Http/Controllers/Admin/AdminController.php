<?php

namespace App\Http\Controllers\Admin;

use Auth;
use Hash;
use Session;
use Validator;
use Carbon\Carbon;
use App\Model\User;
use GuzzleHttp\Client;
use App\Model\Company;
use App\Model\Order;
use App\Model\UserRole;
use App\Model\TakenPackage;
use App\Model\OrderItem;
use Illuminate\Support\Str;
use App\Model\OrderPayment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;
use App\Model\Course;
use App\Model\CreditTransaction;
use App\Model\Package;
use App\Model\Product;
use App\Model\ProductAlarmData;
use App\Model\ProductSettingData;
use App\Model\Subject;
use App\Model\TakenCourse;
use App\Model\TakenCourseExam;
use Illuminate\Support\Facades\Storage;
use GuzzleHttp\Exception\GuzzleException;

class AdminController extends Controller
{
    public function dashboard()
    {
        menuSubmenu('dashboard','dashboard');

        $companyCount = Company::where('status', '<>', 'temp')->count();
        $activeCompanyCount = Company::where('status', '<>', 'temp')->whereHas('takenpackages')->count();
        $packageCount = Package::where('status', '<>', 'temp')->count();
        $subjectCount = Subject::count();
        $courseCount = Course::where('status', '<>', 'temp')->where('course_mode', 'course')->count();
        $qualificationCount = Course::where('status', '<>', 'temp')->where('course_mode', 'qualification')->count();
        $orderCount = Order::count();
        $pendOrderCount = Order::where('order_status', 'pending')->count();
        $takenCoursesCount = TakenCourse::count();
        $takenPackagesCount = TakenPackage::count();
        $takenCourseExamCount = TakenCourseExam::count();
        $userCount = User::all()->count();

    	return  view('admin.dashboard',[
            'userCount' =>$userCount, 
            'companyCount' => $companyCount,
            'activeCompanyCount' => $activeCompanyCount,
            'packageCount' => $packageCount,
            'subjectCount' => $subjectCount,
            'courseCount' => $courseCount,
            'qualificationCount' => $qualificationCount,
            'orderCount' => $orderCount,
            'pendOrderCount' => $pendOrderCount,
            'takenCoursesCount' => $takenCoursesCount,
            'takenPackagesCount' => $takenPackagesCount,
            'takenCourseExamCount' => $takenCourseExamCount,
            ]);
    }
    public function messages()
    {
        menuSubmenu('Messages','Messages');
        $messageFrom = auth()->user();
        $conversations = auth()->user()->messageContacts();
        return view('admin.messages', compact('messageFrom', 'conversations'));
    }

    public function userSearchDashboard(Request $request)
    {
        $q = $request->q;
        $allmembers = User::where('name', 'like', "%{$q}%")->orWhere('email', 'like', "%{$q}%")->orWhere('mobile', 'like', "%{$q}%")->paginate(40);

        
        $page = View('admin.modules.dashboardUserInfoCard',['allmembers' =>$allmembers])->render();
        // dd($page);
        if($request->ajax())
        {
            return Response()->json(array(
            'success' => true,
            'page' => $page,
            ));
        }
    }

    public function report($type)
    {
        if ($type == 'all') {
            $history = CreditTransaction::where('transaction_type', 'add')->latest()->paginate(50);
            $totalTrans = CreditTransaction::where('transaction_type', 'add')->sum('transferred_credit');
        }elseif($type == 'form-yesterday'){
            $history = CreditTransaction::where('transaction_type', 'add')->where('transaction_date', '>=', now()->subDays(1))->latest()->paginate(50);
            $totalTrans = CreditTransaction::where('transaction_type', 'add')->where('transaction_date', '>=', now()->subDays(1))->sum('transferred_credit');
        }elseif($type == 'from-last-week'){
            $history = CreditTransaction::where('transaction_type', 'add')->where('transaction_date', '>=', now()->subDays(7))->latest()->paginate(50);
            $totalTrans = CreditTransaction::where('transaction_type', 'add')->where('transaction_date', '>=', now()->subDays(7))->sum('transferred_credit');
        }elseif($type == 'from-last-month'){
            $history = CreditTransaction::where('transaction_type', 'add')->where('transaction_date', '>=', now()->subDays(30))->latest()->paginate(50);
            $totalTrans = CreditTransaction::where('transaction_type', 'add')->where('transaction_date', '>=', now()->subDays(30))->sum('transferred_credit');
        }
        return view('admin.reportsAll',[
            'type' => $type,
            'history' => $history,
            'totalTrans' => $totalTrans,
        ]);
    }

    public function reportFilter(Request $request)
    {
        menuSubmenu('report', 'all');
        $from = $request->from ?? null;
        $to = $request->to ?? null;
        $for = $request->for ?? null;
        $history = CreditTransaction::where('transaction_type', 'add')->where(function($qry) use($from, $to, $for){
            if ($from != null) {
                $qry->where('transaction_date', '>=', now()->parse($from));
            }
            if ($to != null) {
                $qry->where('transaction_date', '<=', now()->parse($to));
            }
            if ($for != null) {
                $qry->where('credit_for', $for);
            }
        })->latest()->paginate(50);
        $totalTrans = CreditTransaction::where(function($qry) use($from, $to, $for){
            if ($from != null) {
                $qry->where('transaction_date', '>=', now()->parse($from));
            }
            if ($to != null) {
                $qry->where('transaction_date', '<=', now()->parse($to));
            }
            if ($for != null) {
                $qry->where('credit_for', $for);
            }
        })->sum('transferred_credit');
        return view('admin.reportsAll',[
            'type' => 'All',
            'history' => $history,
            'totalTrans' => $totalTrans,
            'from' => $from,
            'to' => $to,
            'for' => $for,
        ]);
    }
    public function message(User $messageTo)
    {
        menuSubmenu('Messages','Messages');
        $messageFrom = auth()->user();
        if($messageFrom->id == $messageTo->id)
        {
            abort(401);
        }

        $conversation = auth()->user()->messageWithUser($messageTo);
        $conversations = auth()->user()->messageContacts();


        return view('admin.messages', compact('messageFrom', 'messageTo', 'conversation', 'conversations'));
    }

    public function deviceSearch(Request $request)
    {
        $q = $request->q;
        $items = Product::where(function($query) use ($q){
            $query->where('macid', 'like', "%{$q}%");
            $query->orWhere('title', 'like', "%{$q}%");
            $query->orWhere('region', 'like', "%{$q}%");
            $query->orWhere('zone', 'like', "%{$q}%");
        })
        ->paginate(20);

        return view('admin.productsAll', [

            'q'=>$request->q,
            'items' => $items

        ]);
    }

    public function companyAllData(Company $company, Request $request)
    {
        $type = $request->type ? : null;
        // dd($company);
        $settingData = $company->productSettingDatas()
        ->whereHas('product',function($query) use ($type){
            if($type == 'battery'){
                $query->where('type',$type);
            }elseif($type == 'rectifier'){
                $query->where('type',$type);

            }

            if($d = request()->device)
            {
                $query->where('product_id', $d);
            }
        })
        ->latest()->paginate(15);



        return view('admin.productsAllActivities',[
            'company' => $company,

            'settingDatas' => $settingData,
            'type'=> $type
        ]);


    }

    public function companiesAll(Request $request)
    {
        $status = $request->status ? : '';
    	menuSubmenu('company', 'companiesAll'.$status);

        $companiesAll = Company::orderBy('title')
        ->where(function($query) use ($status){

            if($status == 'active')
            {
                $query->where('status', $status);
            }elseif($status == 'inactive'){
                $query->where('status', $status);
            }
            else
            $query->where('status', '<>', 'temp');
        })
        ->paginate(50);

    	return view('admin.companiesAll', ['companiesAll'=>$companiesAll,'status'=>$status]);
    }

    public function singleDeviceMap(Company $company, Request $request)
    {
        $products = Product::where('macid', $request->macid)->first();

        // $datas = $product->productLocationDatas()->latest()->paginate(2);
        // dd($datas);
        $product = $products->productLocationDatas()->latest()->first();

        if($product)
        {
            return view('admin.singleDeviceMapLocation',[
               'product' => $product,
                'company' => $company
            ]);
        }
        Session::flash('message', "Device Location Not Found");
        return back();
    }

    public function allProduct(Request $request)
    {
        $type = $request->type ? : '';
        $company_id = $request->company ?: null;

        menuSubmenu('device','productsAll'.$type);

        $data =  Product::where('status', 'active')
        ->where(function($query) use ($type, $company_id){
            if($type == 'battery'){
                $query->where('type',$type);
            }
            elseif($type == 'rectifier'){
                $query->where('type',$type);
            }

            if($company_id)
            {
                $query->where('company_id', $company_id);
            }
        })
        ->has('company')
        ->paginate(20);
        // dd($data);
        return view('admin.productsAll',[
            'items' => $data,
            'type' => $type,
            'company_id'=> $company_id
        ]);
    }

    public function productsAllOfType(Request $request)
    {
        $type = $request->type;
        $status = $request->status;
        $company_id = $request->company ? : null;
        menuSubmenu('device','productsType'.$type.$status);

        $products =  Product::where('status', 'active')
        ->where(function($qq) use ($type,$status,$company_id) {

            $qq->where('type', $type);

            if($status == 'online')
            {
                $qq->where('location_offline', 0);
            }
            elseif($status == 'offline')
            {
                $qq->where('location_offline', 1);
            }

            if($company_id){
                $qq->where('company_id', $company_id);
            }

        })

        ->has('company')

        ->paginate(20);
        return view('admin.productsAll',[
            'items' => $products,
            'type' => $type,
            'company_id' => $company_id
        ]);
    }



    public function allLatestData(Request $request)
    {
        $type =$request->type ? : '';
        menuSubmenu('dataMonitor','latestAll'.$type);

        $settingDatas = ProductSettingData::where('macid','<>',null)
        ->whereHas('product',function ($query) use ($type){
            if($type == 'battery'){
                $query->where('type',$type);
            }elseif($type == 'rectifier'){
                $query->where('type',$type);
            }
        })
        ->latest()->paginate(15);
        // dd($settingDatas);
        return view('admin.latestAllData',[
            'settingDatas' => $settingDatas,
            'type' => $type
        ]);
    }

    public function singleDeviceSingleDataDetails(ProductSettingData $data)
    {
        $products = Product::where('status','active')->pluck('id');

        $alarms = ProductAlarmData::whereIn('product_id',$products)
        ->where('macid',$data->macid)
        ->where('hide', 0)
        ->orderBy('send_time','desc')
        ->latest()
        ->paginate(50);

        return view('admin.singleDeviceSingleDataDetails',[

            'sd'=>$data,
            'product'=> $data->product,
            'alarmData' => $alarms,
        ]);
    }

    public function filterData(Request $request)
    {
        $type = $request->type;
        menuSubmenu('dataMonitor','filterData'.$type);
        $companies = Company::all();
        $products = Product::all();

        return view('admin.allFilterData',[
            'companies' => $companies,
           'products' => $products,
           'type'=> $type
        ]);
    }

    public function searchData(Request $request)
    {
        $type = $request->type;
        menuSubmenu('dataMonitor','filterData'.$type);

        $products = Product::all();
        $companies = Company::all();
        $fromDate = $request->from ?: date('Y-m-d');
        $toDate = $request->to ?: date('Y-m-d');
        $comps = $request->comps;
        $macids = $request->macids;
        $page = $request->pages ?: 20;

        $items = ProductSettingData::whereBetween('created_at', [$fromDate." 00:00:00",$toDate." 23:59:59"])
            ->where(function($query) use ($macids,$comps)
            {

                if($macids)
                {
                    $query->whereIn('macid', $macids);
                }

                if($comps)
                {
                    $query->whereIn('company_id', $comps);
                }

            })
            ->whereHas('product',function($qq) use ($type){
                if($type=='battery')
                {
                    $qq->where('type',$type);
                }elseif($type=='rectifier'){
                    $qq->where('type',$type);
                }
            })
            ->latest()
            ->paginate($page);

        // dd($comps);

        return view('admin.dataSearch',[
            'items' => $items,
            'filter' => $request->filter ?: [],
            'macids' => $request->macids ?: [],
            'from' =>$fromDate,
            'to' =>$toDate,
            'companies' => $companies,
            'comps' => $comps ?: [],
            'products' => $products,
            'pages' => $page,
            'type' => $type

        ]);

    }

    public function alarmDatasearch(Request $request)
    {
        menuSubmenu('alarm','alarmFilter');
        $companies = Company::all();
        $products = Product::all();

        $fromDate = $request->from ?: date('Y-m-d');
        $toDate = $request->to ?: date('Y-m-d');

        $fDate = strtotime($fromDate)*1000;
        $tDate = strtotime($toDate)*1000;

        $macids = $request->macids;
        $comps = $request->comps;

        $page = $request->pages ?: 20;

        $items = ProductAlarmData::whereBetween('send_time', [$fDate,$tDate])
        ->where(function($query) use ($macids, $comps)
        {
            if($macids)
            {
                $query->whereIn('macid', $macids);
            }

            if($comps)
            {
                $query->whereIn('company_id', $comps);
            }
        })
        ->latest()
        ->paginate($page);

        // dd($items);

        return view('admin.alarmSearch',[
            'companies' => $companies,
            'products' => $products,
            'items' => $items,
            'macids' => $request->macids ?: [],
            'from' =>$fromDate,
            'to' =>$toDate,
            'comps' => $comps ?: [],
            'pages' => $page


        ]);
    }

    public function allAlarmData(Request $request)
    {
        $company_id = $request->company ? : null;

        menuSubmenu('alarm','alarmAll');
        $datas = ProductAlarmData::where('macid','<>',null)
        ->where(function($query) use ( $company_id){
            if($company_id){
                $query->where('company_id', $company_id);
            }

            if($d = request()->device)
            {
                $query->where('product_id', $d);
            }
        })
        ->latest()->paginate(15);
        return view('admin.allAlarmsData',[
            'datas' => $datas,
        ]);
    }

    public function alarmDataFilter()
    {
        menuSubmenu('alarm','alarmFilter');
        $company = Company::all();
        $products = Product::all();
        // dd($products);
        return view('admin.alarmFilter',[
           'company' => $company,
           'products' => $products
        ]);
    }

    public function companyEdit(Company $company)
    {
    	return view('admin.companyEdit', ['company'=>$company]);
    }

    public function usersAll()
    {
    	menuSubmenu('user', 'usersAll');

    	$usersAll = User::latest()->paginate(50);

    	return view('admin.usersAll', ['usersAll'=> $usersAll]);
    }

    public function companyOwnerAdd(Company $company, Request $request)
    {
    	$user = User::where('active', true)->where('id', $request->user)->first();

            if($user)
            {
                $company->user_id = $user->id;
                $company->save();

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

    public function newUserCreate()
    {
    	menuSubmenu('user','newUserCreate');

    	return  view('admin.newUserCreate');
    }

    public function companyUpdate(Company $company, Request $request)
    {
    	$validation = Validator::make($request->all(),
        [
            'title' => ['required', 'string', 'max:255','min:3'],
            'description' => ['nullable', 'string', 'max:255'],
            'company_code' => ['nullable', 'string'],
            // 'login_password' => ['nullable','string'],
            // 'login_type' => ['nullable'],
            'mobile' => ['nullable'],
            'email' => ['nullable'],
            'address' => ['nullable'],
            'zip_code' => ['nullable'],
            'city' => ['nullable'],
            'status' => ['nullable'],
            'country' => ['nullable'],

        ]);

        if($validation->fails())
        {

            return back()
            ->with('warning', 'Please, fill-up all the fields correctly and try again')
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
$company->status = $request->status ? 'active' : 'inactive';
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

        return redirect()->route('admin.companyEdit', $company)->with('success', 'Company successfully updated.');
    }

    public function companyAddNew(Request $request)
    {
    	menuSubmenu('company','companyAddNew');
    	$company = Company::where('status', 'temp')->where('addedby_id', Auth::id())->latest()->first();
    	if(!$company)
    	{
    		$company = new Company;
    		$company->status = 'temp';
    		$company->addedby_id = Auth::id();
    		$company->save();
    	}

    	return view('admin.companyAddNew',['company'=>$company]);
    }

    public function newUserCreatePost(Request $request)
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

    public function userEdit(User $user)
    {
    	return view('admin.userEdit', ['user'=>$user]);
    }

    public function userUpdate(User $user, Request $request)
    {
    	$validation = Validator::make($request->all(),
        [
            'name' => ['required', 'string', 'max:255','min:3'],
            'email' => ['required', 'string','email', 'unique:users,email,'.$user->id, 'max:255'],
            'mobile' => ['required', 'string'],
            'password' => ['nullable', 'string', 'min:6', 'confirmed'],
            'active'=> ['nullable']

        ]);

        if($validation->fails())
        {

            return back()
            ->withInput()
            ->withErrors($validation);
        }

        $user->name = $request->name ?: $user->name;
        $user->email = $request->email ?: $user->email;
        $user->mobile = $request->mobile ?: $user->mobile;
        $user->password = $request->password ? Hash::make($request->password) : $user->password;
        $user->active = $request->active ? true : false;

        $user->editedby_id = Auth::id();
        $user->save();

       	return back()->with('success', 'User successfully Updated');

    }

    public function userCompanies(User $user)
    {
    	$companiesAll = $user->companies()->where('status', '<>', 'temp')->orderBy('title')->paginate(100);
    	return view('admin.userCompanies', ['user'=>$user, 'companiesAll' =>$companiesAll]);
    }

    public function companyProducts(Company $company)
    {

                       return view('admin.servicesAll',['company'=>$company, 'items' => $object->rows]);
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



                }else
                {
                    if($request->ajax())
                    {

                      return Response()->json([
                        'view'=>View('admin.includes.modals.productStatusModalLg', [
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
                'view'=>View('admin.includes.modals.productStatusModalLg', [
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


                }else
                {
                    if($request->ajax())
                    {

                      return Response()->json([
                        'view'=>View('admin.includes.modals.productSettingsModalLg', [
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
                'view'=>View('admin.includes.modals.productSettingsModalLg', [
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


                if($arr['success'] == 'true')
                {
                    $data = json_decode($arr['data'][0], true);
                }else
                {
                    if($request->ajax())
                    {

                      return Response()->json([
                        'view'=>View('admin.includes.modals.productVersionModalLg', [
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
                'view'=>View('admin.includes.modals.productVersionModalLg', [
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
        // dd($company);
        return view('admin.companyDetails',['company'=>$company]);
    }

    public function companyDelete(Company $company)
    {
    	if($company->logo_name)
        {
            $f = 'company/logo/'.$company->logo_name;
            if(Storage::disk('upload')->exists($f))
            {
                Storage::disk('upload')->delete($f);
            }
        }

        $company->allMessages()->delete();
        $company->takenCourseExamItems()->delete();
        $company->takenCourseExams()->delete();
        $company->creditTransactions()->delete();
        $company->courseAssignments()->delete();
        $company->courseAssignmentAnswers()->delete();
        $company->takenCourses()->delete();
        $company->takenPackageSubroles()->delete();
        $company->takenpackages()->delete();
        $company->subroles()->delete();
        $company->orders()->delete();
        $company->orderItems()->delete();
        $company->orderPayments()->delete();

        $company->delete();


        return back()->with('success', 'Company successfully deleted');


    }

    // order
    public function order(Request $request)
    {
        $type = $request->type;
        menuSubmenu('order','order'.$type);

        $orders = Order::where('order_status', $type)
            ->latest()
            ->paginate(30);

        return view('admin.order.index',[
            'type' => $type,
            'orders' => $orders
        ]);
    }

    public function individualUserTakenCourses(User $user)
    {
        $takenCourses = $user->takenCourses()->paginate(20);
        return view('admin.users.userIndividualTakenCourses',[
            'user' => $user,
            'userTakenCourses' => $takenCourses,
        ]);
    }

    public function orderDetails(Order $order, Request $request)
    {
        $type = $request->type;
        $orderItem = $order->items()->first();

        return view('admin.order.orderDetails', [
            'order' => $order,
            'orderItem'=>$orderItem,
            'type' => $type,
        ]);
    }

    public function orderItemOrderStatusUpdate(OrderItem $item, Request $request)
    {
        $order = $item->order;
        $status = $request->order_status;

        if($request->order_status != 'cancelled')
        {
            $at_field = $request->order_status.'_at';
            $item[$at_field] = Carbon::now();
        }

        $item->order_status = $status;
        $item->editedby_id = Auth::id();
        $item->save();

        if($order->items->count() == $order->items()->where('order_status', $status)->count())
        {
            if($request->order_status != 'cancelled')
            {
                if($order->order_status != 'cancelled')
                {
                    $order->order_status = $status;
                    // $order->grand_total = $item->total_price;
                    $order->total_paid = $item->total_price;
                    $order[$at_field] = $item[$at_field];
                    $order->editedby_id = Auth::id();
                    $order->save();

                    if($order->payment_status == 'paid' and $order->order_status == 'confirmed')
                    {
                        if($item->taken_pakage_id)
                        {
                            return back()->with('info', 'This order already has a package');
                        }
                        // $item->taken_package_id = $item->package_id;

                        $tp = new TakenPackage;
                        $tp->user_id = $order->user_id;
                        $tp->company_id = $order->company_id ?: null;
                        $tp->package_id = $item->package_id;
                        $tp->order_id = $order->id;
                        $tp->order_item_id = $item->id;

                        if($item->package_id)
                        {
                            $tp->title = $item->package->title;
                            $tp->course_level = $item->package->course_level;
                            $tp->no_of_courses = $item->package->no_of_courses;
                            $tp->no_of_persons =  $item->package->no_of_persons;
                            $tp->no_of_attempts = $item->package->no_of_attempts;
                            $tp->no_of_credits =  $item->package->no_of_credits;
                            $tp->price = $item->package->price;
                            $tp->duration = $item->package->duration;
                            $tp->package_for = $item->package->package_for;
                            $tp->package_type = $item->package->package_type;
                            $tp->taken_date = date('Y-m-d');
                            $tp->expired_date = Carbon::now()->addDays($tp->duration);

                        }

                        $tp->save();

                        $item->taken_package_id = $tp->id;
                        $item->order_status = 'delivered';
                        $item->delivered_at = Carbon::now();
                        $item->save();

                        $order->order_status = 'delivered';
                        $order->delivered_at = Carbon::now();
                        $order->save();

                        $creditTrans = new CreditTransaction;
                        $creditTrans->user_id               = $order->user_id;
                        $creditTrans->company_id            = $order->company_id ?: null;
                        $creditTrans->company_subrole_id    = null;
                        $creditTrans->package_id            = $tp->package_id;
                        $creditTrans->taken_package_id      = $tp->id;
                        $creditTrans->course_id             = null;
                        $creditTrans->taken_course_id       = null;
                        $creditTrans->taken_course_exam_id  = null;
                        $creditTrans->order_id              = $order->id;
                        $creditTrans->previous_credit       = 0;
                        $creditTrans->transferred_credit    = $item->package->no_of_credits;
                        $creditTrans->current_credit        = $item->package->no_of_credits;
                        $creditTrans->transaction_type      = 'add';
                        $creditTrans->credit_from           = 'order';
                        $creditTrans->credit_for            = 'taken_package';
                        $creditTrans->addedby_id            = auth()->user()->id;
                        $creditTrans->transaction_date      = now();
                        $creditTrans->save();
                    }
                }
            }

            else{
                $order->order_status = $status;
                // $order->grand_total = $item->total_price;
                $order->total_paid = $item->total_price;
                $order->editedby_id = Auth::id();
                $order->save();
            }


        }

        return back()->with('success','Item order status successfully updated');

    }

    public function orderPaymentSubmit(Order $order, Request $request)
    {
        // dd('w');

        $paidAmount=$request->paid_amount;
        if($paidAmount < 1){
            return back();
        }
        $dueAmount = $order->total_due - $paidAmount;

        if($dueAmount <= -1){
            return back();
        }

        $dueAmount = $dueAmount <= 1 ? 0 : $dueAmount;

        $payment = OrderPayment::where('order_id',$order->id)->first();
        $item = $order->items()->first();
        $payment->trans_date = now();
        $payment->order_id = $order->id;
        $payment->user_id = Auth::id();
        $payment->payment_by = $request->payment_type;
        $payment->payment_type = $request->payment_type;
        $payment->payment_status = 'completed';
        $payment->bank_name = $request->payment_type;
        $payment->account_number = $request->account_number;
        $payment->cheque_number = null;
        $payment->note = $request->note;
        $payment->paid_amount = $request->paid_amount;
        $payment->receivedby_id = Auth::id();
        $payment->addedby_id = Auth::id();
        $payment->editedby_id = null;

        $payment->save();


        $amount = $request->paid_amount;
        $paidAmount = $order->total_paid + $amount;
        $dueAmount = $order->grand_total - $paidAmount;

        $dueAmount = $dueAmount <= 1 ? 0 : $dueAmount;

        $order->total_paid = $paidAmount;
        $order->total_due = $dueAmount;


        if($dueAmount)
        {
            $order->payment_status = 'partial';
        }
        else
        {
            $order->payment_status = 'paid';
        }


        $order->save();

        if($order->payment_status == 'paid' and $order->order_status == 'confirmed')
        {

            if($item->taken_pakage_id)
            {
                return back()->with('info', 'This order already has a package');
            }
            // $item->taken_package_id = $item->package_id;

            $tp = new TakenPackage;
            $tp->user_id = $order->user_id;
            $tp->company_id = $order->company_id ?: null;
            $tp->package_id = $item->package_id;
            $tp->order_id = $order->id;
            $tp->order_item_id = $item->id;
            if($item->package_id)
            {
                $tp->course_level = $item->package->course_level;
                $tp->no_of_courses = $item->package->no_of_courses;
                $tp->no_of_persons =  $item->package->no_of_persons;
                $tp->no_of_attempts = $item->package->no_of_attempts;
                $tp->no_of_credits =  $item->package->no_of_credits;
                $tp->price = $item->package->price;
                $tp->duration = $item->package->duration;
                $tp->package_for = $item->package->package_for;
                $tp->package_type = $item->package->package_type;
                $tp->taken_date = date('Y-m-d');
                $tp->expired_date = Carbon::now()->addDays($tp->duration);

            }

            $tp->save();

            $item->taken_package_id = $tp->id;
            $item->order_status = 'delivered';
            $item->delivered_at = Carbon::now();
            $item->save();

            $order->order_status = 'delivered';
            $order->delivered_at = Carbon::now();
            $order->save();

            $creditTrans = new CreditTransaction;
            $creditTrans->user_id               = $order->user_id;
            $creditTrans->company_id            = $order->company_id ?: null;
            $creditTrans->company_subrole_id    = null;
            $creditTrans->package_id            = $tp->package_id;
            $creditTrans->taken_package_id      = $tp->id;
            $creditTrans->course_id             = null;
            $creditTrans->taken_course_id       = null;
            $creditTrans->taken_course_exam_id  = null;
            $creditTrans->order_id              = $order->id;
            $creditTrans->previous_credit       = 0;
            $creditTrans->transferred_credit    = $item->package->no_of_credits;
            $creditTrans->current_credit        = $item->package->no_of_credits;
            $creditTrans->transaction_type      = 'add';
            $creditTrans->credit_from           = 'order';
            $creditTrans->credit_for            = 'taken_package';
            $creditTrans->addedby_id            = auth()->user()->id;
            $creditTrans->transaction_date      = now();
            $creditTrans->save();
        }

        return redirect()->back()->with('success','Payment successfully done');
    }

    public function orderPaymentUpdate(OrderPayment $payment, Request $request)
    {
        // dd($request->all());

        $order = $payment->order;

        $paidamount = $request->paid_amount;
        if($paidamount < 1){
            return back();
        }

        $dueAmount = $order->total_due - $paidamount;
        if($dueAmount <= -1){

            return back();
        }

        $dueAmount = $dueAmount <= 1 ? 0 : $dueAmount;

        $payment->trans_date = date('Y-m-d');
        // $payment->order_id = $order->id;
        // $payment->user_id = $order->user_id;
        $payment->payment_by = $request->payment_type;
        $payment->payment_type = $request->payment_type;
        $payment->payment_status = 'completed';

        $payment->bank_name = $request->payment_type;
        $payment->account_number = $request->account_number;
        $payment->cheque_number = null;
        $payment->note = $request->note;
        $payment->paid_amount = $request->paid_amount;
        $payment->receivedby_id = Auth::id();
        // $payment->addedby_id = $order->user_id;
        $payment->editedby_id =Auth::id();
        $payment->save();

        // test
        $amount = $request->paid_amount;
        $paidAmount = $order->total_paid + $amount;
        $dueAmount = $order->grand_total - $paidAmount;
        $dueAmount = $dueAmount <= 1 ? 0 : $dueAmount;

        $order->total_paid = $paidAmount;
        $order->total_due = $dueAmount;
        $order->total_paid = $paidAmount;
         if($dueAmount){
          $order->payment_status = 'partial';
        }else{
          $order->payment_status = 'paid';
        }

        $order->save();

        $item = $order->items()->first();

        if($order->payment_status == 'paid' and $order->order_status == 'confirmed')
        {
            if ($item->order_for == 'package') {
                if($item->taken_pakage_id)
                {
                    return back()->with('info', 'This order already has a package');
                }
                // $item->taken_package_id = $item->package_id;

                $tp = new TakenPackage;
                $tp->user_id = $order->user_id;
                $tp->company_id = $order->company_id ?: null;
                $tp->package_id = $item->package_id;
                $tp->order_id = $order->id;
                $tp->order_item_id = $item->id;
                if($item->package_id)
                {
                    $tp->course_level = $item->package->course_level;
                    $tp->no_of_courses = $item->package->no_of_courses;
                    $tp->no_of_persons =  $item->package->no_of_persons;
                    $tp->no_of_attempts = $item->package->no_of_attempts;
                    $tp->no_of_credits =  $item->package->no_of_credits;
                    $tp->price = $item->package->price;
                    $tp->duration = $item->package->duration;
                    $tp->package_for = $item->package->package_for;
                    $tp->package_type = $item->package->package_type;
                    $tp->taken_date = date('Y-m-d');
                    $tp->expired_date = Carbon::now()->addDays($tp->duration);

                }

                $tp->save();
                $item->taken_package_id = $tp->id;

                $creditTrans = new CreditTransaction;
                $creditTrans->user_id               = $order->user_id;
                $creditTrans->company_id            = $order->company_id ?: null;
                $creditTrans->company_subrole_id    = null;
                $creditTrans->package_id            = $tp->package_id;
                $creditTrans->taken_package_id      = $tp->id;
                $creditTrans->course_id             = null;
                $creditTrans->taken_course_id       = null;
                $creditTrans->taken_course_exam_id  = null;
                $creditTrans->order_id              = $order->id;
                $creditTrans->previous_credit       = 0;
                $creditTrans->transferred_credit    = $item->package->no_of_credits;
                $creditTrans->current_credit        = $item->package->no_of_credits;
                $creditTrans->transaction_type      = 'add';
                $creditTrans->credit_from           = 'order';
                $creditTrans->credit_for            = 'taken_package';
                $creditTrans->addedby_id            = auth()->user()->id;
                $creditTrans->transaction_date      = now();
                $creditTrans->save();
            } elseif($item->order_for == 'credit') {
                $user = $item->user;
                $user->credit = $user->credit+$item->total_price;
                $user->save();

                $creditTrans = new CreditTransaction;
                $creditTrans->user_id               = $item->user->id;
                $creditTrans->company_id            = null;
                $creditTrans->company_subrole_id    = null;
                $creditTrans->package_id            = null;
                $creditTrans->taken_package_id      = null;
                $creditTrans->course_id             = null;
                $creditTrans->taken_course_id       = null;
                $creditTrans->taken_course_exam_id  = null;
                $creditTrans->order_id              = $order->id;
                $creditTrans->previous_credit       = $item->user->credit - $item->total_price;
                $creditTrans->transferred_credit    = $item->total_price;
                $creditTrans->current_credit        = $item->user->credit;
                $creditTrans->transaction_type      = 'add';
                $creditTrans->credit_from           = 'order';
                $creditTrans->credit_for            = 'user_credit';
                $creditTrans->addedby_id            = auth()->user()->id;
                $creditTrans->transaction_date      = now();
                $creditTrans->save();
            }else{
                return redirect()->back()->with('error', 'Unexpected error')->withInput();
            }

            $item->order_status = 'delivered';
            $item->delivered_at = Carbon::now();
            $item->save();

            $order->order_status = 'delivered';
            $order->delivered_at = Carbon::now();
            $order->save();
        }

        return redirect()->back()->with('success','Payment successfully completed');
    }

    public function orderpaymentDelete(OrderPayment $payment)
    {
        $payment->delete();

        return redirect()->back()->with('success','Successfully Payment Delete');
    }

    //admin
    public function adminsAll(Request $request)
    {
        $usersAll = UserRole::has('user')
        // ->where('role_name','admin')
        ->latest()->paginate(20);
        menuSubmenu('role','adminsAll');
        return view('admin.adminsAll',[
            'usersAll'=> $usersAll
        ]);
    }

    public function selectNewRole(Request $request)
    { 
        $users = User::where('email', 'like', '%'.$request->q.'%')
        // ->orWhere('username', 'like', '%'.$request->q.'%')
        // ->orWhere('name', 'like', '%'.$request->q.'%')
        ->orWhere('mobile', 'like', '%'.$request->q.'%')
        ->select(['id','email'])->take(30)->get();
        if($users->count())
        {
            if ($request->ajax())
            {
                // return Response()->json(['items'=>$users]);
                return $users;
            }
        }
        else
        {
            if ($request->ajax())
            {
                return $users;
            }
        }
    }

    public function userDetails(User $user)
    {
        return view('admin.users.userDetails',[
            'user' => $user,
        ]);
    }

    public function adminAddNewPost(Request $request)
    {
        $validatedData = $request->validate([
            'role' => ['required'],
        ]);

        $user = User::where('email', $request->user)->first();
   
        if($user)
        {
            if(!$user->isAdmin())
            {
                $user->roles()->create(['role_name'=>$validatedData['role'],'role_value'=>Str::ucfirst($validatedData['role']),'addedby_id'=>Auth::id()]);
                return back()->with('success', 'New Admin Successfully Created.');
            }
            else
            {
                return back()->with('error', 'This User Already Admin.');
            }            
        }
    }

    public function adminDelete(UserRole $role, Request $request)
    {
        if($role->user->id == Auth::id())
        {
            return back()->with('error', 'Your Admin Role can not be deleted by yourself.');
        }

        $role->delete();
        
        return back()->with('success', 'Admin Successfully Deleted.');

    }

    //admin

}
