@extends('frontend.layouts.app')
@section('content')
<section id="contact-us" style="margin-top: 50px">
    <section class="service-page">
        <div class="container">
                <div class="table-responsive">
                    <table class="table table-bordered text-center table-centered table-striped table-hover mb-4">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Client</th>
                                <th>Order Invoice NO</th>
                                <th>Amount</th>
                                <th>Paid</th>
                                <th>Payment Status</th>
                                <th>Transaction ID</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($service_orders as $key => $service)
                            <tr>
                                <td>{{ $service->created_at }}</td>
                                <td>
                                
                                  {{ $service->user->name }} <br>
                                  {{ $service->user->email }} <br>
                                  {{ $service->user->phone }} 
                                
                                </td>
                                <td>{{ $service->invoice_no }}</td>
                                <td>${{ $service->amount }}</td>
                                <td>${{ $service->paid}}</td>
                                <td>{{ $service->payment_status }}</td>
                                <td>{{ $service->transaction_id}}</td>
                                <td>
                                    <a class="btn btn-sm btn-success" href="{{ route('service_details',$service->id) }}">Details</a>
                                </td>
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
