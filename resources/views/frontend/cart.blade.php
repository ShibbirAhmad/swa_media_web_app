@extends('frontend.layouts.app')
@section('content')
<section id="service-page">
    <div class="container">
        <div class="ps-section__content">
            <div class="table-responsive">
                <table class="table text-center table-hover table-striped ps-table--shopping-cart">
                    <thead>
                        <tr>
                            <th>Item </th>
                            <th>QUANTITY</th>
                            <th>Price</th>
                            <th>TOTAL</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach ($cart_content as $item)
                            <tr class="{{$item->rowId  }}" >
                                <td>
                                    <div class="ps-product--cart">
                                        <div class="ps-product__thumbnail"><a href="{{ route('service.details',$item->id) }}"><img class="cart_preview_img" src="{{ asset('storage/'.$item->options->image) }}" ></a></div>
                                        <div class="ps-product__content"><a href="{{ route('service.details',$item->id) }}">{{ $item->name }}</a>
                                        </div>
                                    </div>
                                </td>
                                  <td class="price">{{ $item->qty }}</td>
                                  <td class="price">${{ $item->price }}</td>
        
                                <td>  <span>${{ $item->qty * $item->price }} </span></td>
                                <td><a style="color:red" href="{{ route('cart_remove', $item->rowId ) }}"><i  class="fa fa-trash-alt "></i></a></td>
                            </tr>
                                                          
                       @endforeach
                          <tr>
                              <td colspan="2"></td>
                              <td>Total ${{ $cart_total }} </td>
                              <td></td>
                          </tr>
                    </tbody>
                </table>
            </div>
         </div>
          <br>
          <br>
         <div class="p_btn_container">

            @if (Auth::user())
                <div id="paypal-button-container"></div>
            @else
                <a href="{{ route('login') }}">
                    <img  class="paypal_payment_img" src="{{ asset('storage/images/basic_img/paypal_img.png') }}" >
                </a>
            @endif
          
              

          </div>
    </div>
</section>
@endsection
