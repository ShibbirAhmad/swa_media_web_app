@extends('frontend.layouts.app')
@section('content')
<section id="service-page">
    <div class="container">
        <div class="search text-end">
            <form action="">
              <input type="text" class="search-box" />
              <span class="search-icon"> <i class="fas fa-search"></i></span>
            </form>
          </div>
        <div class="row">
            @foreach ($logo_designs as $logo)
                <div class="col-xl-3 col-lg-4 col-sm-6 px-0">
                    <h3 class="title"> {{$logo->title}}</h3>
                    <div class="img  left-radius">
                        <a href="{{route('service.details', $logo->id)}}"><img src="{{asset('storage/'.$logo->image)}}" alt=""></a>
                    </div>
                    <h5 class="price">$ {{$logo->price}}</h5>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection