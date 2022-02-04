@extends('frontend.layouts.app')
@section('content')
<section id="contact-us" style="margin-top: 50px">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-9 col-sm-10 offset-sm-2  offset-md-1 contact-us">
               <div class="row">
                   <div class="col-sm-8 left-side">
                      <h2>Send us a message</h2>
                        <h3 class="text-success text-center">{{ Session::get('message') }}</h3>
                      <form action="{{route('contact.store')}}" method="POST">
                        @csrf
                          <div class="input-group mb-3">
                              <input type="text" name="name" class="form-control me-3" placeholder="Name">
                              <input type="email" name="email" class="form-control" placeholder="Email">
                          </div>
                          <div class="mb-3">
                              <input type="text" name="subject" class="form-control me-3" placeholder="subject">
                          </div>
                          <div class="mb-3">
                             <textarea name="message" class="form-control" placeholder="Write Your message"></textarea>
                          </div>
                          <div class="mb-3">
                              <button type="submit" class="btn">sent</button>
                          </div>
                      </form>
                   </div>
                   <div class="col-sm-4 right-side">
                       <h2>Follow us</h2>
                      <P>Don't forget to follow us on our social media channels to get the news about our platform, its updates, and the latest market trends.</P>
                      <ul class="d-flex   text-start">
                          <li>
                              <a href=""><i class="fab fa-facebook-f"></i></a>
                          </li>
                          <li>
                             <a href=""> <i class="fab fa-twitter"></i></a>
                          </li>
                          <li>
                             <a href=""><i class="fab fa-instagram"></i></a>
                          </li>
                          <li>
                             <a href=""><i class="fab fa-youtube"></i></a>
                          </li>
                      </ul>
                   </div>
               </div>
            </div>
        </div>
    </div>
</section>
@endsection
