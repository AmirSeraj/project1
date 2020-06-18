@extends('front.layout')

@section('title')
<title>Rapid Bootstrap Template</title>
@endsection

@include('messages.successMessage')

@section('content')


    @include('front.intro')

    <main id="main">

        <!--==========================
          About Us Section
        ============================-->
        @include('front.aboutUs')


        <!--==========================
          Services Section
        ============================-->
        @include('front.services')

        <!--==========================
          Why Us Section
        ============================-->

        @include('front.why')

        <!--==========================
          Call To Action Section
        ============================-->
        @include('front.call-to-action')

        <!--==========================
          Features Section
        ============================-->

        @include('front.features')

        <!--==========================
          Portfolio Section
        ============================-->

        @include('front.portfolio')

        <!--==========================
          Clients Section
        ============================-->

        @include('front.testimonials')

        <!--==========================
          Team Section
        ============================-->

        @include('front.team')

        <!--==========================
          Clients Section
        ============================-->

        @include('front.client')


        <!--==========================
          Pricing Section
        ============================-->
        @include('front.pricing')

        <!--==========================
          Frequently Asked Questions Section
        ============================-->
        @include('front.faq')

    </main>

@endsection
