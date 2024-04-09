@extends('frontend.frontend_master')

@section('title')
About Us
@endsection

@section('content')

<div class="banner-agile">

    @include('frontend.body.menu')
    <!--about us start-->
    <div class="about-page py-5">
        <div class="container py-xl-5 py-lg-3">
            <h3 class="title text-capitalize font-weight-light text-dark text-center mb-5">about
                <span class="font-weight-bold">us</span>
            </h3>
            <div class="row about-head-wthree">
                <div class="col-lg-6 left-abw3ls">
                    <img src="{{ asset('/') }}frontend/images/ap-1.jpg" alt="" class="img-fluid">
                </div>
                <div class="col-lg-6 right-abw3ls mt-lg-0 mt-sm-5 mt-4">
                    <h4 class="font-italic border-bottom text-center font-weight-bold pb-3 mb-4">Our History</h4>
                    <p>Eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                        laboris nisi, Eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                        ullamco laboris nisi. </p>
                    <p class="mt-3">Labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi, Eiusmod tempor
                        incididunt ut labore et dolore magna aliqua. Ut enim ad.</p>
                </div>
            </div>
        </div>
    </div>
     <!--about us end-->

</div>{{-- banner agile --}}


@endsection
