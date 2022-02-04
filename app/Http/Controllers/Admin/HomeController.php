<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $banners = Banner::orderBy('id','desc')->get();
        return view('admin.index',compact('banners'));
    }

    public function login(Request $request){


        return  view('auth.login');
    }


    public function userDashboard()
    {
        return view('admin.user_dashboard.user_dashboard');
    }


}
