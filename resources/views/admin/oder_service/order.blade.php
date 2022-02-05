@extends('admin.layouts.app')
@section('title', 'Service Order')

@section('content')
    <div class="layout-px-spacing">

        <div class="row layout-top-spacing justify-content-center">


            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <div id="tableHover" class="col-lg-12 col-12 layout-spacing">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <h4>Service Orders Records </h4>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            <div class="table-responsive">
                                <table class="table table-bordered text-center table-striped table-hover mb-4">
                                    <thead>
                                        <tr>
                                            <th colspan="4" width="30%">Client Information</th>
                                            <th colspan="6" width="70%"> Order Information</th>
                                        </tr>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>Invoice</th>
                                            <th>Amount</th>
                                            <th>Paid</th>
                                            <th>Payment Status</th>
                                            <th>Transaction ID</th>
                                            <th>Details</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($service_orders as $key => $service)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $service->user->name }}</td>
                                                <td>{{ $service->user->phone }}</td>
                                                <td>{{ $service->user->email }}</td>
                                                <td>{{ $service->invoice_no }}</td>
                                                <td>${{ $service->amount }}</td>
                                                <td>${{  $service->paid}}</td>
                                                <td>{{ $service->payment_status }}</td>
                                                <td>{{ $service->transaction_id}}</td>
                                                <td><a href="{{route('service_order_item', $service->id)}}"><button class="btn btn-info">Details</button></a></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="pagination_container">
                                {{ $service_orders->links() }}
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
