@extends('frontend.layouts.app')
@section('content')
    <section id="payment">
        <div class="container">
            <div class="search text-end">
                <form method="post" action="{{ route('search_service') }}">
                   @csrf
                  <input type="text" name="search" class="search-box" />
                  <button type="submit" class="service_search_btn search-icon"> <i class="fas fa-search"></i></button>
                </form>
              </div>
            <div class="row justify-content-evenly">
                <div class="col-md-5 offset-lg-1 offset-sm-2 text-center">
                    <h3 class="title text-center">{{ $service->title }}</h3>
                    <div class="img ">
                        <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->title }}">
                        <a service_id="{{ $service->id }}" class="quick_cart_btn"><i class="fa fa-shopping-cart"></i></a>
                    </div>


                    <br>
                    <br>

                    <div class="p_btn_container">

                      @if (Auth::user())
                          <div id="paypal-button-container"></div>
                      @else
                          <a href="{{ route('login') }}">
                              <img  class="paypal_payment_img" src="{{ asset('storage/images/basic_img/paypal_img.png') }}" >
                          </a>
                      @endif
                    
                        

                    </div>


                </div>
                <div class="col-md-5 description text-center">
                    <h2>Discription</h2>
                    <p style="font-size: 14px">{{ $service->description }}</p>
                    <h5 class="price">$ {{ $service->price }}</h5>
                </div>
            </div>

        </div>
    </section>




    <br>
    <br>
    <br>
    <section id="service-page">
        <div class="container">
       
            <div class="row">
                <h4 class="title">Related Design </h4>
                @foreach ($related_services as $service)
                    <div class="col-xl-3 col-lg-4 col-sm-6 px-0">
                        <h3 class="title"> {{$service->title}}</h3>
                        <div class="img left-radius">
                            <a href="{{route('service.details', $service->id)}}"><img height="220px" src="{{asset('storage/'.$service->image)}}" alt=""></a>
                        </div>
                        <h5 class="price">$ {{$service->price}}</h5>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


@endsection
