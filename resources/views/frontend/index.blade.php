@extends('frontend.layouts.app')
@section('content')
 <!-- media part start -->
 <section id="media">
    <div class="container">
      <div class="search text-end">
        <form method="post" action="{{ route('search_service') }}">
           @csrf
          <input type="text" name="search" class="search-box" />
          <button type="submit" class="service_search_btn search-icon"> <i class="fas fa-search"></i></button>
        </form>
      </div>
      <div class="row justify-space-between">
        <div class="col-xxl-6 offset-xl-2 col-xxl-1 offset-xl-2 col-lg-5 offset-md-2 col-md-6 content">
          <h2>SWA MEDIA</h2>
          <p>
            Advertising company offers design services and follow-up social
            networking accounts Provide creative ideas, contemporary and
            professional designs in implementation
          </p>
        </div>
        <div class="col-lg-5 col-xxl-4 col-md-4 ">
          <div class="right-img">
            <img
              src="{{asset('storage/images/basic_img/design_demo.png')}}"
      
            />
          </div>
        </div>
        <div class="col-lg-10 offset-xl-1 offset-lg-2 text-center payment">
          <h2>Payment methods</h2>
          <ul class="text-center justify-content-center d-flex pyment_img">
            <li>
              <a href="#">
                <img src="{{asset('storage/images/basic_img/pament1-removebg-preview.png')}}" alt="" />
              </a>
            </li>
            <li>
              <a href="#">
                <img src="{{asset('storage/images/basic_img/pament2-removebg-preview.png')}}" alt="" />
              </a>
            </li>
            <li>
              <a href="#">
                <img src="{{asset('storage/images/basic_img/pament3-removebg-preview.png')}}" alt="" />
              </a>
            </li>
            <li>
              <a href="#">
                <img src="{{asset('storage/images/basic_img/pament4-removebg-preview.png')}}" alt="" />
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <!-- media part end -->
  <!-- service part start -->

  <section id="service">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-xxl-7 offset-xl-2 offset-xxl-1 col-md-6 offset-md-2   secvice-content">
          <p>
            Advertising company offers design services and follow-up social
            networking accounts
          </p>
        </div>
        <div class="col-md-4 text-end">
          <div class="img">
            <img src="{{asset('storage/images/basic_img/service01.jpg')}}" alt="" />

            <div class="icon d-flex justify-content-end">
              <a href=""><i class="fas fa-shopping-cart"></i></a>
              <a href=""><i class="fas fa-comment-alt"></i></a>
            </div>
          </div>
        </div>

        <div class="col-md-4  offset-xxl-1 offset-xl-2 offset-md-2 text-end">
          <div class="img">
            <img src="{{asset('storage/images/basic_img/service01.jpg')}}" alt="" />

            <div class="icon d-flex justify-content-end">
              <a href=""><i class="fas fa-shopping-cart"></i></a>
              <a href=""><i class="fas fa-comment-alt"></i></a>
            </div>
          </div>
        </div>
        <div class="col-xxl-7 col-xl-6 col-md-6 secvice-content">
          <p>
            Advertising company offers design services and follow-up social
            networking accounts
          </p>
        </div>
        <div class="col-xxl-7 col-xl-6 col-xl-6 offset-xl-2 offset-xxl-1 col-md-6 offset-md-2  secvice-content">
          <p>
            Advertising company offers design services and follow-up social
            networking accounts
          </p>
        </div>
        <div class="col-md-4 text-end">
          <div class="img">
            <img src="{{asset('storage/images/basic_img/service02.jpg')}}" alt="" />

            <div class="icon d-flex justify-content-end">
              <a href=""><i class="fas fa-shopping-cart"></i></a>
              <a href=""><i class="fas fa-comment-alt"></i></a>
            </div>
          </div>
        </div>
        <div class="col-md-4 offset-xl-2 offset-xxl-1 offset-md-2 text-end">
          <div class="img">
            <img src="{{asset('storage/images/basic_img/service02.jpg')}}" alt="" />

            <div class="icon d-flex justify-content-end">
              <a href=""><i class="fas fa-shopping-cart"></i></a>
              <a href=""><i class="fas fa-comment-alt"></i></a>
            </div>
          </div>
        </div>
        <div class="col-xl-6 col-xxl-7 col-md-6 secvice-content  ">
          <p>
            Advertising company offers design services and follow-up social
            networking accounts
          </p>
        </div>



      </div>
    </div>
  </section>
<!-- service part ends -->

@endsection
