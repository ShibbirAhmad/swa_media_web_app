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






}
