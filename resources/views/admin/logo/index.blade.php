@extends('admin.layouts.app')
@section('title','Logo')

@section('content')
    <div class="layout-px-spacing">

        <div class="row layout-top-spacing justify-content-center">

            <div class="col-lg-12">
                <button class="btn btn-primary mb-2 mr-2 btn-rounded modal_show" route="{{ route('company_logo.create') }}"
                    modal-title="Create logo">Add</button>

            </div>

            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <div id="tableHover" class="col-lg-12 col-12 layout-spacing">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12 text-center">
                                    <h4>Logo List</h4>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-striped text-center mb-4">
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($logos as $logo)

                                            <tr>
                                                <td> <img class="" height="100" width="200" src="{{  asset('storage/'.$logo->image) }}" alt="{{ $logo->name }}"> </td>

                                                <td>

                                                    <a href="#" route="{{ route('company_logo.destroy', $logo->id) }}"
                                                        class="btn btn-sm btn-danger btn_delete">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                    <a href="#" route="{{ route('company_logo.edit', $logo->id) }}"
                                                        class="btn btn-sm btn-success modal_show_edit"
                                                        modal-title="Edit-Logo">
                                                        <i class="fa fa-edit"></i>
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
