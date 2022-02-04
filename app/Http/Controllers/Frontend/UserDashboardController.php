<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServiceOrder;
use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    public function index()
    {
        $orders = ServiceOrder::where('user_id',auth()->user()->id)->orderBy()->get();
        return view('frontend.user_dashboard.index');
    }
    public function userInfo()
    {
        return 'Hello World';
    }
}
