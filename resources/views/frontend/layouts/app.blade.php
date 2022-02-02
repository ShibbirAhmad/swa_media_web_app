<!DOCTYPE html>
<html lang="en">

<head>

    @php
          $setting= App\Models\GeneralSetting::latest()->first();
    @endphp

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="modern building construction " />
    <meta name="description" content="Make Construction Your Dream Into Reality" />
    <meta name="author" content="http://nitaqatgcckw.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>  {{  $setting->title }} </title>
    <link rel="icon" type="image/x-icon"  href="{{ asset('storage/'.$setting->fav_icon) }}">
    @include('frontend.inc.css')
    <meta name="csrf-token" content="{{ csrf_token() }}">



</head>

<body>

        @include('frontend.inc.header')

        @yield('content')

        @include('frontend.inc.footer')
        @include('frontend.inc.js')



    </body>

    </html>
