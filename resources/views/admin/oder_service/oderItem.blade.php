@extends('admin.layouts.app')
@section('title','Service Order Item')

@section('content')
    <div class="layout-px-spacing">

        <div class="row layout-top-spacing justify-content-center">

            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <div id="tableHover" class="col-lg-12 col-12 layout-spacing">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12 text-center">
                                    <h4>Service Order Item List</h4>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
