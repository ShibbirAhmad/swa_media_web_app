<?php

namespace App\Http\Controllers\Frontend;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;


class CartController extends Controller
{
    public function addCart(Request $request,$id){

           $service=Service::findOrFail($id);
    
           Cart::add([
                'id' => $service->id,
                'name'=>$service->title,
                'qty' => $request->quantity ?? 1,
                'price' => $service->price,
                'weight' => 0,
                'tax' => 0,
                'options' =>
                     [
                         'image'=> $service->image ?? 'noimage.png',
                      ]
            ]);

        return response()->json([
            'status'=>'OK',
            'message'=>$service->name.' added your cart'
        ]);
        

 }

 public function cartContent(){

    $cart_content=Cart::content();
    $cart_total=Cart::subtotal();

    return view('frontend.cart',compact('cart_content','cart_total'));
       
    }


    
    public function viewCart(){

        $cart_content=Cart::content();
        $cart_total=Cart::subtotal();
        $cart_item = Cart::count() ;
        return view('frontend.cart',compact(['cart_content','cart_total','cart_item']));

    }



    public  function cartUpdate(Request $request){
    //    return $request->all();
        $rowId =$request->rowId ;
        Cart::update($rowId, $request->qty) ;
        $cart_content = Cart::content();
        $cart_total=Cart::subtotal();
        $cart_item = Cart::count() ;
        $updated_qty =0;
        $item_price =0;
        foreach($cart_content as $item) {
            if ($item->rowId==$rowId) {
                $updated_qty += $item->qty ;
                $item_price += $item->price ;
            }
        }
        return response()->json([
                'status'=>'OK',
                'updated_qty'=>$updated_qty,
                'item_price'=>$item_price,
                'cart_total'=>$cart_total,
                'cart_content'=>$cart_content,
                'item_count'=> $cart_item ,
            ]);

    }

    public  function cartDestroy($rowId){

        Cart::remove($rowId);
        return redirect()->back();


    }






    public function addWishlist(Request $request,$id){

           $service=Service::findOrFail($id);
           Cart::instance('wishlist')->add($service->id,$service->name,1,$service->sale_price,00,['slug' => $service->slug ,'image' => $service->thumbnail_img ?? 'noimage.png' ]);
            return response()->json([
                'status'=>'OK',
                'message'=>$service->name.' added to  wishlist',
                'wishlist_item'=>Cart::instance('wishlist')->count(),
            ]);
            

    }



    public function viewWishlist(){

        $wishlist_content=Cart::instance('wishlist')->content();
        $wishlist_item = Cart::instance('wishlist')->count();
        return view('frontend.wishlist',compact(['wishlist_content','wishlist_item']));

        }




    public  function wishlistDestroy($rowId){

            Cart::instance('wishlist')->remove($rowId);
            return response()->json([
                'status'=>'OK',
                'message' => 'item removed from your wishlist',
                'wishlist_item'=>Cart::instance('wishlist')->count(),
            ]);


    }






}
