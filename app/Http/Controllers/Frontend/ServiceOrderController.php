<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use App\Models\Service;
use App\Models\ServiceOrder;
use Illuminate\Http\Request;
use App\Models\ServiceOrderItem;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;

class ServiceOrderController extends Controller
{
    public function orderList()
    {
        $user = Auth::user();
        
    }


    public function serviceOrder(Request $request)
    {
        $user = Auth::user();
        $user_id = $user->id;
        $amount = $request->amount;
        $payment_status = $request->payment_status;
        $paid = $request->paid;
    }




   

    public  function  storeOrder(Request $request){
        
        DB::beginTransaction();
        try {

            $invoice_no = 222 +  ServiceOrder::max('id') ?? 22 +  rand(1111,9999);
            $order = new ServiceOrder();
            $order->invoice_no = $invoice_no ;
            // $order->user_id = auth()->user()->id ;
            $order->user_id = 1;
            $order->transaction_id = $request->data['transaction_id'] ?? null ;
            $order->payment_status = $request->data['payment_status'] ?? null ;
            $order->amount=Cart::total();
            $order->paid=$request->data['paid'] ?? 0;
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
