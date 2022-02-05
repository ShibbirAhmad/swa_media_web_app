@extends('admin.layouts.app')
@section('content')
    <div class="layout-px-spacing">

        <div class="row layout-top-spacing">

            <div class="col-xl-6 col-lg-6  col-md-6 col-sm-12 col-12 layout-spacing">
                <div class="clients">
                    <h4 style="margin-top: 22px">Total Clients: {{ $clients }}</h4>
                </div>
            </div>

            <div class="col-xl-6 col-lg-6  col-md-6 col-sm-12 col-12 layout-spacing">
                <div class="clients">
                    <h4 style="margin-top: 22px">Total Service: {{ $all_services }}</h4>
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
                                        <th>Date</th>
                                        <th>Client</th>
                                        <th>Invoice No.</th>
                                        <th>Amount</th>
                                        <th>Paid</th>
                                        <th>Payment Status</th>
                                        <th>Transaction ID</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($services as $key => $service)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $service->created_at->diffForHumans() }}</td>
                                            <td>
                                                {{ $service->user->name }} <br>
                                                {{ $service->user->email }} <br>
                                                {{ $service->user->phone }}
                                            </td>
                                            <td>{{ $service->invoice_no }}</td>
                                            <td>${{ $service->amount }}</td>
                                            <td>${{ $service->paid }}</td>
                                            <td>{{ $service->payment_status }}</td>
                                            <td>{{ $service->transaction_id }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-xl-12 col-lg-12  col-md-6 col-sm-12 col-xs-12 layout-spacing">
                <div class="widget widget-table-three">

                    <div class="widget-heading">
                        <h5 class="">Top Selling Service In Last 15 Days</h5>
                    </div>

                    <div class="widget-content">
                        <div class="table-responsive">
                            <table class="table table-bordered text-center table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>
                                            #
                                        </th>
                                        <th>
                                            Service
                                        </th>
                                        <th>
                                            Service Type
                                        </th>
                                        <th>
                                        Price 
                                        </th>
                                        <th>
                                            Total Sales
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($top_selling_products_this_week as $key => $item)

                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>
                                                <div style="display: flex">
                                                    <img style="width:80px;height:80px;"
                                                        src="{{ asset('storage/' . $item->service->image) }}">
                                                   <p style="margin-left:50px;margin-top:30px;">  {{ $item->service->title }} </p>
                                                </div>
                                            </td>
                                            <td>{{ $item->service->service_type }}</td>
                                            <td>${{ $item->service->price }}</td>
                                            <td>{{ $item->total_sale }}</td>
                                           
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
