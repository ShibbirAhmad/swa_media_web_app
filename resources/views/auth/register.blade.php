@extends('frontend.layouts.app')
@section('content')
<section id="sign-up">
    <div class="container">

      <div class="row justify-content-center">

        <div class="col-lg-6 col-md-8 col-sm-9">
            <div class="card">
                <div class="card-header">
                    <div class="title">
                        <h2>Create Account</h2>
                    </div>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                    <form class="form" action="{{ route('new_user_register') }}" method="post">
                        @csrf
                        <div class="mb-3">
                         <input name="name" type="text" class="form-control" placeholder="Name">
                            @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <input name="email"  type="email" class="form-control" placeholder="Email">
                            @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <input name="phone" type="text" class="form-control" placeholder="Phone Number">
                        </div>
                        <div class="mb-4">
                            <input name="password" type="password" class="form-control" placeholder="Password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="form-control">submit</button>
                        </div>
                    </form>
                </div>
            </div>


        </div>

      </div>
    </div>
  </section>
@endsection
