<?php

namespace App\Http\Controllers\User;

use Auth;
use Carbon\Carbon;
use App\Model\User;
use App\Model\Course;
use App\Model\Company;
use App\Model\Package;
use App\Model\OrderItem;
use App\Model\TakenCourse;
use App\Model\OrderPayment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\CreditTransaction;
use App\Model\TakenPackage;

class UserOrderController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function checkoutPackage(Package $package)
    {
        $user = Auth::user();
        $company = '';
        if($package->package_for=='individual'){
            $takenPackageChk = $user->takenPackage()->where('company_id', null)->where('package_id', $package->id)->first();
            if ($takenPackageChk != null) {
                return redirect()->back()->with('error', 'You alredy have this package');
            }
        }
        // if($package->package_for =='company'){
        //     $takenPackageChk = $user->takenPackage()->where('company_id', null)->where('package_id', $package->id)->first();
        //     if ($takenPackageChk != null) {
        //         return redirect()->back()->with('error', 'You alredy have this package');
        //     }
        // }
        return view('theme.prt.checkout.checkoutDetails',[
            'package'=> $package,
            'user' => $user,
            'company' => $company
        ]);    
    }
    public function checkoutCredit()
    {
        $user = Auth::user();
        $order_for = 'credit';
        return view('theme.prt.checkout.checkoutDetails',[
            'user' => $user,
            'order_for' => $order_for,
        ]);    
    }
    public function buyCredit()
    {
        $user = Auth::user();
        $company = '';
        return view('theme.prt.checkout.checkoutDetails',[
            'package'=> $package,
            'user' => $user,
            'company' => $company
        ]);    
    }

    public function checkoutPackageCompany(Package $package, Request $request)
    {
        if($request->company)
        {
            $company = Company::find($request->company);
        }
        $takenPackageChk = TakenPackage::where('company_id', $company->id)->where('package_id', $package->id)->first();
            if ($takenPackageChk != null) {
                return redirect()->back()->with('error', 'You alredy have this package');
            }

        $user = Auth::user();

        return view('theme.prt.checkout.checkoutCompanyDetails',[
            'package'=> $package,
            'user' => $user,
            'company'=>$company
        ]);
    }

    public function paymentDone(OrderItem $item, Request $request)
    {
        $payment = new OrderPayment;

        $payment->trans_date = Carbon::now();
        $payment->order_id = $item->order_id;
        $payment->user_id = $item->user_id;


        if($item->company_id)
        {
            $payment->company_id = $item->company_id;
        }
        $payment->payment_type = $request->payment_by;
        $payment->paid_amount = $item->total_price;
        $payment->payment_status = 'pending';
        $payment->addedby_id = Auth::id();

        $checkif = OrderPayment::where('order_id', $payment->order_id)->where('user_id', $payment->user_id)->first();
        if ($checkif) {
            return redirect()->back()->with('error',  'payment already done!');
        }elseif($item->company_id){
            $checkif = OrderPayment::where('order_id', $payment->order_id)->where('company_id', $item->company_id)->first();
            if ($checkif) {
                return redirect()->back()->with('error',  'payment already done!');
            }
        }
        
        $payment->save();


        return view('theme.prt.payment.paymentComplete',[
            'payment'=>$payment
        ]);
    }

    public function takeCourseUsingCredit(Course $course)
    {
        $me = Auth::user();
        if(!$me->canTakeCourse($course))
        {
            return back()->with('error', 'You cant take this course.');
        }

        $takenCourseChk = auth()->user()->takenCourses()->where('user_id', auth()->user()->id)->where('course_id', $course->id)->where('company_id', null)->first();
        if ($takenCourseChk != null) {
            return redirect()->back()->with('error', 'This course is already taken by you.');
        }
        //checking-function for previous taken course will be here.

        $me->credit = $me->credit - $course->course_credit;
        $me->save();

        $takenCourse = new TakenCourse;
        $takenCourse->user_id = $me->id;
        $takenCourse->company_id = null;
        $takenCourse->subrole_id = null;
        $takenCourse->package_id = null;
        $takenCourse->course_id = $course->id;
        $takenCourse->course_title = $course->title;
        $takenCourse->course_credit = $course->course_credit;
        $takenCourse->attempt_duration = $course->attempt_duration;
        $takenCourse->course_from = 'user_credit';
        $takenCourse->taken_package_id = null;
        $takenCourse->taken_package_user_id = null;
        $takenCourse->taken_date = Carbon::now() ;
        $takenCourse->expired_date = Carbon::now()->addDays(365);
        // 1year expire date 365

        // $course->attempt_started_at = hee ;
        $takenCourse->addedby_id = $me->id;

        $takenCourse->save();

        //for used_credit histry
        //a null exam row can be created here

        $creditTrans = new CreditTransaction;
        $creditTrans->user_id               = $me->id;
        $creditTrans->company_id            = null;
        $creditTrans->company_subrole_id    = null;
        $creditTrans->package_id            = null;
        $creditTrans->taken_package_id      = null;
        $creditTrans->course_id             = $course->id;
        $creditTrans->taken_course_id       = $takenCourse->id;
        $creditTrans->taken_course_exam_id  = null;
        $creditTrans->order_id              = null;
        $creditTrans->previous_credit       = $me->credit + $course->course_credit;
        $creditTrans->transferred_credit    = $course->course_credit;
        $creditTrans->current_credit        = $me->credit;
        $creditTrans->transaction_type      = 'used';
        $creditTrans->credit_from           = 'user_credit';
        $creditTrans->credit_for            = 'taken_course';
        $creditTrans->addedby_id            = auth()->user()->id;
        $creditTrans->transaction_date      = now();
        $creditTrans->save();

        return back()->with('success','You have successfully taken course using your credit.');
    }
    
}
