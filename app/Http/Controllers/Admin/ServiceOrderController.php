<?php

namespace App\Http\Controllers\Admin;

use App\Models\ServiceOrder;
use Illuminate\Http\Request;
use App\Models\ServiceOrderItem;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;

class ServiceOrderController extends Controller
{
    public function serviceOrders()
    {
        $service_oders = ServiceOrder::orderBy('id', 'desc')->paginate(30);
        return view('admin.oder_service.order', compact('service_oders'));
    }

    public function serviceOrderItem()
    {
        $serviceOrderItem = ServiceOrderItem::all();
        return view('admin.oder_service.oderItem', compact('serviceOrderItem'));
    }





    public  function  storeOrder(Request $request){
        
           DB::beginTransaction();
           try {

               $invoice_no = 222 +  ServiceOrder::max('id') ?? 22 +  rand(1111,9999);
               $order = new ServiceOrder();
               $order->invoice_no = $invoice_no ;
               $order->user_id = auth()->user()->id ;
               $order->transaction_id = $request->transaction_id ?? null ;
               $order->payment_status = $request->payment_status ?? null ;
               $order->amount=Cart::total();
               $order->paid=$request->paid ?? 0;
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
            return response()->json([
                'status' => 'OK',
                'message' => 'Your order placed successfully.',
            ]);
          
           } catch (\Throwable $e) {
               DB::rollBack();
               return response()->json([
                   'status' => 'FAILED',
                   'message' => $e->getMessage(),
               ]);
           }
         
    } 






}
