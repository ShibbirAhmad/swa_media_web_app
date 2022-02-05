<?php

namespace App\Http\Controllers\Frontend;

use App\Models\ServiceOrder;
use Illuminate\Http\Request;
use App\Models\ServiceOrderItem;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;

class ServiceOrderController extends Controller
{





    public function index()
    {
        $auth = Auth::user()->id;
        $service_orders = ServiceOrder::where('user_id', $auth)->orderBy('id', 'desc')->get();
        return view('frontend.user_dashboard.index', compact('service_orders'));
    }


    public function serviceDetails($id)
    {

        $order=ServiceOrder::where('user_id',Auth::user()->id)->where('id',$id)->first();
        $service_items = ServiceOrderItem::where('service_order_id', $order->id)->get();
        return view('frontend.user_dashboard.service_details', compact('service_items','order'));
    }


    


    public  function  storeOrder(Request $request){

        DB::beginTransaction();
        try {

            $invoice_no = 222 +  ServiceOrder::max('id') ?? 22 +  rand(1111,9999);
            $order = new ServiceOrder();
            $order->invoice_no = $invoice_no ;
            $order->user_id = auth()->user()->id ;
            $order->transaction_id = $request->transaction_id ;
            $order->payment_status = $request->payment_status ;
            $order->amount=Cart::subtotal();
            $order->paid=$request->paid;
            $order->save();
            //save order details
            foreach(Cart::content() as $service){
                 $details=new ServiceOrderItem();
                 $details->service_order_id=$order->id;
                 $details->service_id=$service->id;
                 $details->qty=$service->qty;
                 $details->save();
             }
         DB::commit();
         Cart::destroy();
         return response()->json([
             'success' => 'OK',
             'message' => 'Your order placed successfully.',
         ]);

        } catch (\Throwable $e) {
            DB::rollBack();
            return response()->json([
                'success' => 'FAILED',
                'message' => $e->getMessage(),
            ]);
        }

    }





}
