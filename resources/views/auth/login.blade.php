@extends('frontend.layouts.app')
@section('content')
<section id="sign-in">
    <div class="container">

      <div class="row justify-content-center">

        <div class="col-lg-6 ">
            <div class="card">
                <div class="card-header">
                    <div class="title">
                        <h2>Log in</h2>
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

                    <form class="form" method="post" action="{{ route('login') }}">
                        @csrf
                        @foreach($errors->all() as $error)
                            <h2 style="color: red; text-align: center">{{$error}}</h2>
                        @endforeach
                        <div class="mb-4">
                            <input  type="email" name="email" class="form-control" placeholder="User Email">
                        </div>
                        <div class="mb-4">
                            <input  type="password" name="password" class="form-control" placeholder="User Password">
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="form-control">submit</button>
                        </div>
                    </form>
                   <h4>Don't have account ? <a href="{{ url('register') }}">register here</a></h4>
                </div>
            </div>


        </div>

      </div>
    </div>
  </section>
@endsection
