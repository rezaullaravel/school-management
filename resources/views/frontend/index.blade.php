@extends('frontend.frontend_master')

@section('title')
    শাহ্জাদপুর ইন্সটিটিউট অব ইঞ্জিনিয়ারিং এন্ড টেকনোলজি ( সিয়েট পলিটেকনিক )
@endsection
@section('content')
    @include('frontend.body.slider')
    <div class="main-body">
        <div class="row">
            <div class="col-lg-9 col-md-9 col-12">
                @include('frontend.body.left_side')
            </div>

            <!-- left body -->
            <div class="col-lg-3 col-md-3 col-12">
                @include('frontend.body.right_sidebar')
            </div>
            <!-- left body -->

        </div>
    </div>
@endsection
