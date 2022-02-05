@extends('admin.layouts.app')
@section('content')
<div class="layout-px-spacing">

    <div class="row layout-top-spacing">

        <div class="col-xl-6 col-lg-6  col-md-6 col-sm-12 col-12 layout-spacing">
            <div class="clients">
                <h4 style="margin-top: 22px">Total Clients: {{$clients}}</h4>
            </div>
        </div>

        <div class="col-xl-6 col-lg-6  col-md-6 col-sm-12 col-12 layout-spacing">
            <div class="clients">
                <h4 style="margin-top: 22px">Total Service: {{$all_services}}</h4>
            </div>
        </div>

        <div class="col-xl-12 col-lg-12  col-md-12 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-table-two">

                <div class="widget-heading">
                    <h5 class="">Recent Service Orders</h5>
                </div>

                <div class="widget-content">
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
                                @foreach ($services as $key => $service)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $service->serviceOrder->user->name }}</td>
                                        <td>{{ $service->serviceOrder->user->phone }}</td>
                                        <td>{{ $service->serviceOrder->invoice_no }}</td>
                                        <td>{{ $service->serviceOrder->paid }}</td>
                                        <td>{{ $service->serviceOrder->amount -  $service->serviceOrder->paid}}</td>
                                        <td>{{ $service->serviceOrder->payment_status }}</td>
                                        <td>{{ $service->serviceOrder->transaction_id}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-xl-6 col-lg-6  col-md-6 col-sm-12 col-xs-12 layout-spacing">
            <div class="widget widget-table-three">

                <div class="widget-heading">
                    <h5 class="">Top Selling Service In Last 7 Days</h5>
                </div>

                <div class="widget-content">
                    <div class="table-responsive">
                        <table class="table  table-scroll">
                            <thead>
                                <tr>
                                    <th><div class="th-content">Service</div></th>
                                    <th><div class="th-content"> Price </div></th>
                                    <th><div class="th-content">Image</div></th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach ($top_selling_products_this_week as $order)

                                <tr>
                                    <td>{{$order->service_type}}</td>
                                    <td>{{$order->price}}</td>
                                    <td><div class="td-content product-name"><img src="{{ asset('storage/'.$order->image) }}">
                                 </tr>

                               @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection
