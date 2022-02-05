<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Client;
use App\Models\Service;
use App\Models\ServiceOrderItem;
use Illuminate\Http\Request;
use Carbon\Carbon;
class HomeController extends Controller
{
    public function index(){
        $services = ServiceOrderItem::Latest()->take(8)->get();
        $all_services = Service::count();
        $clients = Client::count();
        $date = Carbon::now()->subDays(7);
        $top_selling_products_this_week = Service::where('created_at', '>=', $date)->get();
        return view('admin.index',compact('services', 'all_services', 'clients', 'top_selling_products_this_week'));
    }

    public function adminLogin(){

        return  view('admin.login');
    }




}
