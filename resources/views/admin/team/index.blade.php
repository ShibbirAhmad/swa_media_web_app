@extends('admin.layouts.app')
@section('title','Team')

@section('content')
    <div class="layout-px-spacing">

        <div class="row layout-top-spacing justify-content-center">

            <div class="col-lg-12">
                <button class="btn btn-primary mb-2 mr-2 btn-rounded modal_show" route="{{ route('team.create') }}"
                    modal-title="Create Team Member">Add</button>

            </div>

            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <div id="tableHover" class="col-lg-12 col-12 layout-spacing">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12 text-center">
                                    <h4>SAWA-MEDIA</h4>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-striped text-center mb-4">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Designation</th>
                                            <th>Position</th>
                                            <th>Image</th>
                                            <th>Status</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($teams as $team)

                                            <tr>
                                                <td>{{ $team->name }}</td>
                                                <td>{{ $team->designation }}</td>
                                                <td>{{ $team->position }}</td>
                                                <td> <img class="profile_img" src="{{  asset('storage/'.$team->image) }}" alt="{{ $team->name }}"> </td>
                                               <td>
                                                 @if ($team->status==1)
                                                    <span
                                                        class="btn btn-sm btn-success ">
                                                        active
                                                   </span>
                                                    @else
                                                    <span class="btn btn-sm btn-warning ">
                                                     in-active </span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($team->status==1)
                                                    <a href="#" route="{{ route('team.show', $team->id) }}"
                                                        class="btn btn-sm btn-warning btn_status_change">
                                                        <i class="fa fa-ban"></i>
                                                    </a>
                                                    @else
                                                    <a href="#" route="{{ route('team.show', $team->id) }}"
                                                        class="btn btn-sm btn-success btn_status_change">
                                                        <i class="fa fa-check"></i>
                                                    </a>
                                                    @endif

                                                    <a href="#" route="{{ route('team.edit', $team->id) }}"
                                                        class="btn btn-sm btn-success modal_show_edit"
                                                        modal-title="Edit-{{ $team->name }}">
                                                        <i class="fa fa-edit"></i>
                                                    </a>

                                                    <a href="#" route="{{ route('team.destroy', $team->id) }}"
                                                        class="btn btn-sm btn-danger btn_delete">
                                                        <i class="fa fa-trash"></i>
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
