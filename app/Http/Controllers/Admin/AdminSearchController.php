<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Order;
use App\Model\User;
use Illuminate\Http\Request;

class AdminSearchController extends Controller
{
    public function searchorderAjax(Request $request)
    {
        $q = $request->q;
        $orders = Order::where('invoice_number', 'like', "%{$q}%")
            ->orWhere('name', 'like', "%{$q}%")
            ->orWhere('email', 'like', "%{$q}%")
            ->orWhere('mobile', 'like', "%{$q}%")
            // ->orWhere('address', 'like', "%{$q}%")
            // ->orWhere('order_for', 'like', "%{$q}%")
            // ->orWhere('order_status', 'like', "%{$q}%")
            ->orWhere(function($qry) use ($q){
                if (isset($qry->company_id) && $qry->company_id != null) {
                    $qry->company()->where('title', $q);
                }
        })
        ->latest()
        ->paginate(12);

    
        // $page = View('admin.order.modules.orderDetailsTable', [
        //     'orders' => $orders,
        // ])->render();
        $page = View('admin.order.modules.orderDetailsTable',['orders' =>$orders])->render();
        // dd($page);
        if($request->ajax())
        {
            return Response()->json(array(
            'success' => true,
            'page' => $page,
            ));
        }

    }
    
    public function userSearchAjax(Request $request)
    {
    	$q = $request->q;
        $usersAll = User::where('name', 'like', "%{$q}%")
            ->orWhere('email', 'like', "%{$q}%")
            ->orWhere('mobile', 'like', "%{$q}%")
        ->latest()
        ->paginate(50);
    
        // $page = View('admin.order.modules.orderDetailsTable', [
        //     'orders' => $orders,
        // ])->render();
        $page = View('admin.modules.allUsersTable',['usersAll' =>$usersAll])->render();
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
