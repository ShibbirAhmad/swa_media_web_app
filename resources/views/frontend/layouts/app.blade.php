<!DOCTYPE html>
<html lang="en">

<head>

    @php
          $setting= App\Models\GeneralSetting::latest()->first();
    @endphp

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="modern building construction " />
    <meta name="description" content="buy logo, business card" />
    <meta name="author" content="http://swamedia.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>  {{  $setting->title }} </title>
    <link rel="icon" type="image/x-icon"  href="{{ asset('storage/'.$setting->fav_icon) }}">
    @include('frontend.inc.css')
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script src="https://www.paypal.com/sdk/js?client-id=AU6IqjLY5eGu0EkQAuGtYg3Ky0sbE7thBsLgfWlbfu6kDYSyPtFw3p6LzSdLnwkg7x5I8YMrhgJOsN6_&currency=USD"></script>

</head>

<body>

        @include('frontend.inc.header')
        
        @yield('content')

        @include('frontend.inc.footer')
        @include('frontend.inc.js')

        @stack('extra_js')
    </body>

    </html>
