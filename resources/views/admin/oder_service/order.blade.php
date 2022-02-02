@extends('admin.layouts.app')
@section('title','Service Order')

@section('content')
    <div class="layout-px-spacing">

        <div class="row layout-top-spacing justify-content-center">

            {{-- <div class="col-lg-12">
                <button class="btn btn-primary mb-2 mr-2 btn-rounded modal_show" route="{{ route('service.create') }}"
                    modal-title="Create service">Add</button>

            </div> --}}

            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <div id="tableHover" class="col-lg-12 col-12 layout-spacing">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12 text-center">
                                    <h4>Service List</h4>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-striped text-center mb-4">
                                    <thead>
                                        <tr>
                                            <th>User Name</th>
                                            <th>Amount</th>
                                            <th>Payment Status</th>
                                            <th>Paid</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($service_oders as $service)

                                            <tr>
                                                <td>{{$service->user_id}}</td>
                                                <td>{{$service->amount}}</td>
                                                <td>{{$service->payment_status}}</td>
                                                <td>{{$service->paid}}</td>
                                                <td>
                                                    <a href="#" route="{{ route('service.edit', $service->id) }}"
                                                        class="btn btn-sm btn-success modal_show_edit"
                                                        modal-title="Edit-Service">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                </td>
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
