<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Service;
use App\Models\ServiceOrder;
use App\Models\ServiceOrderItem;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(){
        $services = ServiceOrder::latest()->take(10)->orderBy('id','desc')->get();
        $all_services = Service::count();
        $clients = User::where('role',1)->count();
        $top_selling_products_this_week= ServiceOrderItem::where('created_at', '>=', Carbon::today()->subDays('7')->startOfDay())
                                     ->where('created_at', '<=', Carbon::today()->endOfDay())
                                     ->select(DB::raw('count(*) as total_sale, service_id'))
                                     ->groupBy('service_id')->get()->each(function($value){
                                        $value->{'service'} = Service::findOrFail($value->service_id);
                                     });
        return view('admin.index',compact('services', 'all_services', 'clients', 'top_selling_products_this_week'));
    }

    public function adminLogin(){

        return  view('admin.login');
    }




}
