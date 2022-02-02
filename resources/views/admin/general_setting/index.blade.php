@extends('admin.layouts.app')
@section('title','setting')

@section('content')
    <div class="layout-px-spacing">

        <div class="row layout-top-spacing justify-content-center">

            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <div id="tableHover" class="col-lg-12 col-12 layout-spacing">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12 text-center">
                                    <h4> General Setting and Site Info </h4>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-striped text-center mb-4">
                                    <thead>
                                        <tr>
                                            <th>Logo</th>
                                            <th>Favicon</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>Addess</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                            <tr>

                                                <td> <img class="company_logo" src="{{  asset('storage/'.$setting->logo) }}" > </td>
                                                <td> <img width="32px" height="32px" src="{{  asset('storage/'.$setting->fav_icon) }}" > </td>
                                                <td>{{ $setting->contact_number }}</td>
                                                <td>{{ $setting->contact_email }}</td>
                                                <td>{{ $setting->contact_address }}</td>

                                                <td>
                                                    <a href="#" route="{{ route('general_setting.edit', $setting->id) }}"
                                                        class="btn btn-sm btn-success modal_show_edit"
                                                        modal-title="Edit-General Information">
                                                        <i class="fa fa-edit"></i>
                                                    </a>

                                                </td>

                                            </tr>

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
