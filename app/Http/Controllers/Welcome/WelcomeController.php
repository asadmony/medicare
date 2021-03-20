<?php

namespace App\Http\Controllers\Welcome;

use Auth;
use Validator;
use Carbon\Carbon;
use App\Model\Order;
use App\Model\Course;
use App\Model\Company; 
use App\Model\Subject;
use App\Model\Package;
use App\Model\OrderItem;
use App\Model\CompanySubrole; 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Page;
use App\Model\PageItem;
use Illuminate\Support\Facades\Storage;
use PDF;
use Illuminate\Support\Str;

class WelcomeController extends Controller
{
    public function welcome()
    {
    	// if(Auth::check())
    	// {
    	// 	if(Auth::user()->isAdmin())
    	// 	{
    	// 		return redirect()->route('admin.dashboard');
    	// 	}

    	// 	if(Auth::user()->hasCompanyRole())
        //     {
        //         foreach (Auth::user()->activeCompanies() as $company) 
        //         {
        //             return redirect()->route('company.dashboard', $company);
        //         }
        //     }

        //     if(Auth::user()->hasSubrole())
        //     {
        //         foreach (Auth::user()->activeSubroles() as $subrole) 
        //         {
        //             return redirect()->route('subrole.dashboard', $subrole);
        //         }
        //     }

			

		// 	return redirect()->route('home');

            
        // }
        
        $courses = Course::where('status','published')->paginate(96);
        $featuredCourses = Course::where('status','published')
            ->where('featured',true)
            ->paginate(48);
        $packages = Package::where('status','active')
            ->where('active',true)->get();
        
    	return view('theme.prt.index',[
            'courses'=>$courses,
            'featuredCourses' => $featuredCourses,
            'packages' => $packages
        ]);
    }

    public function allCoursesQualificationByMode(Request $request)
    {
        $courses = Course::where('course_mode', $request->mode)->where('status','published')->paginate(96);


        return view('theme.prt.course.allCoursesQualificationByMode',[
            'courses' => $courses,
            'mode' => $request->mode
        ]);
    }


    public function registrationOption()
    {
        return view('theme.prt.registrationOption');
    }

    public function courseDetails(Course $course)
    {
        $packages = Package::where('active', true)->where('status', 'active')->where('course_level', $course->course_level)->get();
        return view('theme.prt.course.singleCourseDetails',[
            'course' => $course,
            'packages' => $packages
        ]);
    }
    public function search(Request $request, Course $course)
    {
        $courses = $course->search($request->q);
        return view('theme.prt.course.allCoursesQualificationByMode',[
            'courses' => $courses,
            'mode' => 'Courses and Qualifications',
            'search' => $request->q,
        ]);
    }

    public function faceToFace(Course $course)
    {
        return view('theme.prt.course.faceToFace',[
            'course' => $course,
        ]);
    }

    public function packageDetails(Package $package)
    {
        return view('theme.prt.package.singlePackageDetails',[
            'package' => $package
        ]);
    }

    public function addNewCompany(Request $request)
    {
        // dd($request->all());
        $validation = Validator::make($request->all(),
        [ 
            'title' => ['required', 'string', 'max:255','min:3'],
            'description' => ['nullable', 'string', 'max:255'],
            'company_code' => ['required', 'string', 'unique:companies'],
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
        $user = Auth::user();
        $company = new Company; 
        $company->user_id = $user->id;
        $company->title = $request->title ?: $company->title;
        $company->description = $request->description ?: null;
        $company->company_code = $request->company_code ?: $company->company_code;
        
        // $company->mobile = $request->mobile ?: $company->mobile;
        // $company->email = $request->email ?: $company->email;
        $company->mobile = $user->mobile;
        $company->email = $user->email;
        $company->address = $request->address ?: $company->address;
        $company->zip_code = $request->zip_code ?: $company->zip_code;
        $company->city = $request->city ?: $company->city;
        $company->country = $request->country ?: $company->country;
        $company->status = $request->status ? 'active' : 'inactive';
        $company->editedby_id = Auth::id();
        $company->status = 'active';

        $company->save();

        $subrole = new CompanySubrole;
        $subrole->addedby_id = $user->id;
        $subrole->company_id = $company->id;
        $subrole->user_id = $user->id;
        $subrole->title = 'member';
        $subrole->status = 'active';
        $subrole->save();

        return redirect()->back();
    }

    public function checkoutPost(Request $request)
    {
        // dd($request->all());

        // dd($request->company);
        $user = Auth::user();
        if (isset($request->package)) {
            $package = $request->package;
            if($request->company)
            {
                $company = $request->company;
            }
            else{
                $company = '';
            }
            $pack = Package::where('id',$package)->first();
            
            if($company != null){
                $comp = Company::where('id',$company)->first();
            }
            
            
            $order = new Order;

            if($pack->package_for == 'company')
            {
                $order->company_id = $comp->id;
            }
            
            $total_due = $pack->price;
            $grand_total = $pack->price;
            $order_for = 'package';
            $package_id =$package;
        }else{
            if ($request->credit == null) {
                return redirect()->back()->with('error', 'Credits not be null!')->withInput();
            }
            $order = new Order;
            $total_due = $request->credit;
            $grand_total = $request->credit;
            $order_for = 'credit';
            $package_id = null;
        }

        $order->invoice_number = date('ymd').rand(1000,9999);
        $order->user_id = Auth::check() ? Auth::id() : null;
        $order->mobile  = $user->mobile ?: null;
        $order->address = $request->address ?: null;
        $order->name    = $user->name ?: null;
        $order->email   = $user->email ?: null;
        $order->order_for   = $order_for;
        $order->order_status = 'pending';
        $order->pending_at  = Carbon::now();
        $order->total_due = $total_due;
        $order->grand_total = $grand_total;
        $order->save();

        $item = new OrderItem;
        $item->order_id = $order->id;
        if(isset($pack) && $pack->package_for == 'company')
        {
            $item->company_id = $comp->id;
        }
        $item->user_id = Auth::check() ? Auth::id() : null;
        $item->order_status = 'pending';
        $item->package_id = $package_id;   
        $item->total_price = $grand_total;
        $item->order_for   = $order_for;
        $item->addedby_id = Auth::check() ? Auth::id() : null;
        $item->pending_at = Carbon::now();

        $item->save();
        
        return view('theme.prt.payment.payment',[
            'item'=>$item
        ]);
    }
    public function page(Page $page)
    {
        $pageParts = $page->items()->where('active', 1)->get();
        return view('theme.prt.page',[
            'page'=>$page,
            'pageParts'=>$pageParts,
        ]);
    }


    // pdf generator
    public function pdf()
    {
        // return view('pdf');
        $pdf = PDF::loadView('pdf')->setOptions(['defaultFont' => 'sans-serif','isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);
        Storage::disk('upload')->put('certificates/invoice.pdf', $pdf->output());
        return $pdf->download('anc.pdf');
    }
}
