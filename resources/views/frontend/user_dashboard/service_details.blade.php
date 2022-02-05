@extends('frontend.layouts.app')
@section('content')
<section id="contact-us" style="margin-top: 50px">
    <section class="service-page">
        <div class="container">
                <div class="table-responsive">
                    <table class="table table-bordered text-center table-striped table-hover mb-4">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Service</th>
                                <th>Price</th>
                                <th>Quanttiy</th>
                                <th>Amount</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($service_items as $key => $item)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td> <div style="display: fex;">
                                     <img style="width:80px;height:80px;" src="{{ asset('storage/'.$item->service->image) }}" >
                                     <p>{{ $item->service->title }} </p> 
                                    </div> 
                                </td>
                                <td>${{ $item->service->price }}</td>
                                <td>{{ $item->qty }}</td>
                                <td>${{ $item->qty * $item->service->price   }}</td>
    
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <a class="btn btn-info " href="{{ route('user.dashboard') }}"> <i class="fa fa-arrow-left"></i> Go Back</a>
                </div>


            </div>
        </div>
    </section>

</section>
@endsection
