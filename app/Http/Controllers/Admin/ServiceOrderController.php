<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServiceOrder;
use App\Models\ServiceOrderItem;
use Illuminate\Http\Request;

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
