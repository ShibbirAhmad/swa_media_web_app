@extends('frontend.layouts.app')
@section('content')
<section id="payment">
    <div class="container">
     <div class="search text-end">
         <form action="">
           <input type="text" class="search-box" />
           <span class="search-icon"> <i class="fas fa-search"></i></span>
         </form>
       </div>
       <div class="row justify-content-evenly">
           <div class="col-md-5 offset-lg-1 offset-sm-2 text-center">
               <h3 class="title text-center">{{$service->title}}</h3>
               <div class="img ">
                   <img src="{{asset('storage/'.$service->image)}}" alt="{{$service->title}}">
                   <a service_id="{{ $service->id }}"  class="quick_cart_btn"><i class="fa fa-shopping-cart"></i></a>
               </div>
              
                
               <br>
               <br>

               <div class="p_btn_container">

                   <div id="paypal-button-container"></div>
              
               </div>
               
        
           </div>
           <div class="col-md-5 description text-center">
               <h2>Discription</h2>
               <p style="font-size: 14px">{{$service->description}}</p>
                <h5 class="price">$ {{$service->price}}</h5>
           </div>
       </div>
    </div>
 </section>

@endsection


