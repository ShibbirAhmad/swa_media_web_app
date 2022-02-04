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
                                            <th>Address</th>

                                            <th>Date</th>
                                            <th>Invoice</th>
                                            <th>Payment</th>
                                            <th>Discount</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        {{-- @foreach ($orders as $key => $order)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $order->customer->name }}</td>
                                                <td>{{ $order->customer->phone }}</td>
                                                <td>{{ $order->customer->address }}</td>

                                                <td>{{ $order->created_at }}</td>
                                                <td>{{ $order->invoice_no }}</td>
                                                <td>
                                                    <div class="payment_container">
                                                        <ul>
                                                            <li>Total: <span style="padding-left: 25px">
                                                                    &#2547;{{ $order->total }} </span> </li>
                                                            <li>Shipping:<span
                                                                    style="padding-left: 5px">&#2547;{{ $order->shipping_cost }}
                                                                </span> </li>
                                                            <li>Paid:
                                                                @if (!empty($order->payment))

                                                                    @if ($order->payment->status == 'Pending')
                                                                        <span style="padding-left: 30px">
                                                                            {{ 'Pending' . '-' . $order->payment->amount }}
                                                                        </span>
                                                                    @else
                                                                        <span style="padding-left: 30px">
                                                                            {{ $order->payment->status . '-' . $order->payment->amount }}
                                                                        </span>
                                                                    @endif


                                                                @else
                                                                    <span style="padding-left: 30px">&#2547;0</span>
                                                                @endif

                                                            </li>
                                                            <li>Due: <span
                                                                    style="padding-left: 32px">&#2547;{{ $order->total + $order->shipping_cost - ($order->paid + $order->discount) }}
                                                                </span></li>
                                                        </ul>
                                                    </div>
                                                </td>
                                                <td>{{ $order->discount }}</td>
                                                <td>
                                                    <span class="badge badge-info">{{ $order->status }}</span>
                                                    @if ($order->print_status == 1)
                                                        <span style="margin-top: 10px" class="badge badge-success"> Printed
                                                        </span>
                                                    @endif
                                                </td>
                                                <td>

                                                </td>
                                            </tr>
                                        @endforeach --}}
                                    </tbody>
                                </table>
                            </div>

                            <div class="pagination_container">
                                {{-- {{ $orders->links() }} --}}
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
