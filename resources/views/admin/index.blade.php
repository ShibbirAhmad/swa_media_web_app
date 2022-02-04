@extends('admin.layouts.app')
@section('content')
<div class="layout-px-spacing">

    <div class="row layout-top-spacing">

      
   
        <div class="col-xl-12 col-lg-12  col-md-12 col-sm-12 col-12 layout-spacing">
            <div class="widget widget-table-two">

                <div class="widget-heading">
                    <h5 class="">Recent Service Orders</h5>
                </div>

                <div class="widget-content">
                    <div class="table-responsive">
                        <table class="table text-center">
                            <thead>
                                <tr>
                                    <th><div class="th-content">Client</div></th>
                                    <th><div class="th-content">Service</div></th>
                                    <th><div class="th-content">Invoice</div></th>
                                    <th><div class="th-content th-heading">Total</div></th>
                                    <th><div class="th-content">Status</div></th>
                                    <th><div class="th-content">Payable amount</div></th>
                                    <th><div class="th-content">Payment Status</div></th>
                                </tr>
                            </thead>
                            <tbody>
                              {{-- @foreach ($recent_orders as $order)
                                <tr>
                                    <td><div class="td-content customer-name"><img src="{{asset('admin/assets/img/90x90.jpg')}}" alt="avatar"><span>{{ $order->customer->name }}</span></div></td>
                                    <td><div class="td-content product-brand text-primary"> <img style="width: 60px;height:60px;" src="{{asset('storage/images/thumbnail_img/'.$order->order_items[0]->product->thumbnail_img)}}" />
                                                                                           <p> {{ $order->order_items[0]->product->name }} </p></div></td>
                                    <td><div class="td-content product-invoice">{{ $order->invoice_no }}</div></td>
                                    <td><div class="td-content pricing"><span class="">&#2547;{{ $order->total }}</span></div></td>
                                    <td><div class="td-content"><span class="badge badge-success">{{ $order->status }}</span></div></td>
                                    <td><div class="td-content"><span class="">&#2547;{{ $order->payment ?  $order->payment->amount : '0' }}</span></div></td>
                                    <td><div class="td-content"><span class="badge badge-success">{{ $order->payment ?  $order->payment->status : 'none' }}</span></div></td>
                                </tr>                            
                              @endforeach     --}}
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
                                    <th><div class="th-content">Total Sold</div></th>
                                </tr>
                            </thead>
                            <tbody>
                              {{-- @foreach ($top_selling_products_this_week as $order)

                                <tr>
                                    <td><div class="td-content product-name"><img src="{{ asset('storage/images/thumbnail_img/'.$order->product->thumbnail_img) }}">
                                        <div class="align-self-center"><p class="prd-name">{{ $order->product->name}}</p></div></div></td>
                                    <td> {{ $order->product->code  }} </td>
                                    <td><div class="td-content"><span class="pricing">{{ $order->total }}</span></div></td>
                                 </tr>
                                  
                               @endforeach --}}

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection
