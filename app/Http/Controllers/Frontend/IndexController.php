<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Team;
use App\Models\Client;
use App\Models\Slider;
use App\Models\CompanyLogo;
use Illuminate\Http\Request;
use App\Models\GeneralSetting;
use App\Http\Controllers\Controller;
use App\Models\Service;  
use Illuminate\Support\Facades\Artisan;

class IndexController extends Controller
{

    public function index()
    {

        Artisan::call('storage:link');
        $teams = Team::where('status',1)->orderBy('position','asc')->get();
        $sliders = Slider::inrandomOrder()->take(2)->get();
        $logos = CompanyLogo::get();
        $clients = Client::where('status',1)->get();
        $setting=GeneralSetting::latest()->first();
        $services = Service::where('status',1)->orderBy('id', 'desc')->get();

        return view('frontend.index',compact(['clients','teams','sliders','logos','setting', 'services']));
    }




    public function team()
    {
        $teams = Team::where('status',1)->orderBy('position','asc')->get();
        return view('frontend.team',compact(['teams']));
    }


    public function service()
    {
        $services = Service::where('status', 1)->get();
        return view('frontend.service', compact('services'));
    }


    public function logoDesign()
    {
        $logo_designs = Service::where('service_type','logo_design')->where('status', 1)->get();
        return view('frontend.logoDesign',compact('logo_designs'));
    }


    public function businessCard()
    {
        $business_card = Service::where('service_type','business_card_design')->where('status', 1)->get();
        return view('frontend.business',compact('business_card'));
    }

  
  
    public function serviceDetails($id)
    {
        $service = Service::findOrFail($id);
        $related_services =Service::where('service_type',$service->service_type)->where('id','!=',$service->id)->get();
        return view('frontend.logoPayment', compact('service','related_services'));
    }

  
    public function serviceSearch(Request $request)
    {
      
        $services =Service::where('title','like','%'.$request->search.'%')->orWhere('description','like','%'.$request->search.'%')->get();
        return view('frontend.search', compact('services'));
    }


    public function contact()
    {
        return view('frontend.contact');
    }
    public function support()
    {
        return view('frontend.support');
    }

    public function about()
    {
        return view('frontend.about');
    }

    public function company()
    {
        return view('frontend.company');
    }

    public function userLogin()
    {
        return view('frontend.sign_in');
    }

    public function userRegister()
    {
        return view('frontend.sign_up');
    }




}
