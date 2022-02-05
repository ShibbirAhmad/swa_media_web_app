@extends('frontend.layouts.app')
@section('content')
<section id="contact-us" style="margin-top: 50px">
    <section id="service-page">
        <div class="container">
                <div class="table-responsive">
                    <table class="table table-bordered text-center table-striped table-hover mb-4">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Invoice</th>
                                <th>Payment</th>
                                <th>Due</th>
                                <th>Status</th>
                                <th>Transaction ID</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($service_orders as $key => $service)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $service->user->name }}</td>
                                <td>{{ $service->user->phone }}</td>
                                <td>{{ $service->invoice_no }}</td>
                                <td>{{ $service->paid }}</td>
                                <td>{{ $service->amount -  $service->paid}}</td>
                                <td>{{ $service->payment_status }}</td>
                                <td>{{ $service->transaction_id}}</td>
                                {{-- <td><a href="{{route('all.service', $service->id)}}"><button class="btn btn-info">Details</button></a></td> --}}
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>


            </div>
        </div>
    </section>

</section>
@endsection
