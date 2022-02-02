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
               <h3 class="title text-center">{{$detailsService->title}}</h3>
               <div class="img ">
                   <img src="{{asset('storage/'.$detailsService->image)}}" alt="{{$detailsService->title}}">
                   <a href=""><i class="fas fa-shopping-cart"></i></a>
               </div>
              <a href="" class=" paypal-btn"><img src="{{asset('storage/images/basic_img/pament1-removebg-preview.png')}}" alt="paypel"></a>
              <ul class="payment-btn-group d-flex justify-content-evenly mt-2">
                  <li><a href="#"><img src="{{asset('storage/images/basic_img/pament3-removebg-preview.png')}}" alt=""></a></li>
                  <li><a href="#"><img src="{{asset('storage/images/basic_img/pament2-removebg-preview.png')}}" alt=""></a></li>
                  <li><a href="#"><img src="{{asset('storage/images/basic_img/pament4-removebg-preview.png')}}" alt=""></a></li>
              </ul>
           </div>
           <div class="col-md-5 description text-center">
               <h2>Discription</h2>
               <p style="font-size: 14px">{{$detailsService->description}}</p>
                <h5 class="price">$ {{$detailsService->price}}</h5>
           </div>
       </div>
    </div>
 </section>

@endsection
