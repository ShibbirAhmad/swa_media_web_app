@extends('frontend.layouts.app')
@section('content')
<section class="service-page">
    <div class="container">

        <div class="row">
            @forelse ($services as $service)
                <div class="col-xl-3 col-lg-4 col-sm-6 px-0">
                    <h3 class="title"> {{$service->title}}</h3>
                    <div class="img  left-radius">
                        <a href="{{route('service.details', $service->id)}}"><img height="220px" src="{{asset('storage/'.$service->image)}}" alt=""></a>
                    </div>
                    <h5 class="price">$ {{$service->price}}</h5>
                </div>
            @empty
                <h4 class="title"> Sorry! No Service Found </h4>
            @endforelse
        </div>
    </div>
</section>
@endsection
