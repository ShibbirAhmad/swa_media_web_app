<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServiceOrder;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceOrderController extends Controller
{
    // public function orderList()
    // {
    //     $user = Auth::user();
    //     $customer = Customer::where('phone', $user->mobile_no)->first();
    //     if ($customer) {
    //         $orders = Service::where('customer_id', $customer->id)->orderBy('id', 'desc')->paginate(5);
    //         return response()->json([
    //             'status' => 'SUCCESS',
    //             'orders' => $orders
    //         ]);
    //     }
    // }


    public function serviceOrder(Request $request)
    {
        $user = Auth::user();
        $user_id = $user->id;
        $amount = $request->amount;
        $payment_status = $request->payment_status;
        $paid = $request->paid;
    }

    public function index()
    {
        $auth = Auth::user()->id;
        $orders = ServiceOrder::where('user_id',$auth)->get();
        return view('frontend.user_dashboard.index', compact('orders'));
    }

}
