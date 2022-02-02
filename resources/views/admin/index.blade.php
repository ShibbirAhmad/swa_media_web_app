@extends('admin.layouts.app')
@section('content')
<div class="layout-px-spacing">

    <div class="row layout-top-spacing">

        @foreach ($banners as $banner)
            {{-- <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 col-xs-12 layout-spacing">
                 <img style="width:100%;height:100%" src="{{ asset('storage/'.$banner->image) }}" >
            </div> --}}
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 col-xs-12 layout-spacing">
                <a href="#" route="{{ route('banner.edit', $banner->id) }}"
                    class="modal_show_edit"
                    modal-title="Edit-Banner">
                 <img style="width:100%;height:100%" src="{{ asset('storage/'.$banner->image) }}" >
                </a>
            </div>
        @endforeach



    </div>

</div>
@endsection
