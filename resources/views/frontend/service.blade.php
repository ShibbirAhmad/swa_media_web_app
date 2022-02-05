@extends('frontend.layouts.app')
@section('content')
<section class="service-page">
    <div class="container">
        <div class="search text-end">
            <form method="post" action="{{ route('search_service') }}">
               @csrf
              <input type="text" name="search" class="search-box" />
              <button type="submit" class="service_search_btn search-icon"> <i class="fas fa-search"></i></button>
            </form>
          </div>
        <div class="row">
            @foreach ($services as $service)
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
