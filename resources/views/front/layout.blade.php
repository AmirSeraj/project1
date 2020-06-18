<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    @yield('title')
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <link href="front/img/favicon.png" rel="icon">
    <link href="front/img/apple-touch-icon.png" rel="apple-touch-icon">
    <link rel="stylesheet" href="{{url('/front/css/app.css')}}">
    <link href="{{url('/front/lib/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">

    {!! htmlScriptTagJsApi(['lang'=>'fa']) !!}

</head>

<style>
    @font-face {
        font-family: IRANSansLight;
        src: url("fonts/Iranfont/eot/IRANSansWeb_Light.eot?#iefix") format('embedded-opentype'),
        url("fonts/Iranfont/ttf/IRANSansWeb_Light.ttf") format('truetype'),
        url("fonts/Iranfont/woff/IRANSansWeb_Light.woff") format('woff'),
        url("fonts/Iranfont/woff2/IRANSansWeb_Light.woff2") format('woff2');
    }

    /*font-style:normal;*/
    /*font-weight:normal;*/

</style>

<body dir="rtl">
<!--==========================
Header
============================-->

@include('front.header')

<!--==========================
  Intro Section
============================-->


@yield('content')

<!--==========================
  Footer
============================-->

@include('front.footer')

<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
<!-- Uncomment below i you want to use a preloader -->

<script src="{{url('/front/js/app.js')}}"></script>


</body>

</html>
