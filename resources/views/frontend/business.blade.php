@extends('frontend.layouts.app')
@section('content')
<section class="service-page">
    <div class="container">
        <div class="search text-end">
            <form action="">
              <input type="text" class="search-box" />
              <span class="search-icon"> <i class="fas fa-search"></i></span>
            </form>
          </div>
        <div class="row">
            @foreach ($business_card as $business)
                <div class="col-xl-3 col-lg-4 col-sm-6 px-0">
                    <h3 class="title"> {{$business->title}}</h3>
                    <div class="img  left-radius">
                        <a href="{{route('service.details', $business->id)}}"><img src="{{asset('storage/'.$business->image)}}" alt=""></a>
                    </div>
                    <h5 class="price">$ {{$business->price}}</h5>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
