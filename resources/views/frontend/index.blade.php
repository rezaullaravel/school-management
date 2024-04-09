@extends('frontend.frontend_master')


@section('title')
Home Page
@endsection

@section('content')

<!-- banner -->
<div class="banner-agile">
    @include('frontend.body.slider')
    <!-- navigation -->
    @include('frontend.body.menu')
    <!-- //navigation -->
</div>
<!-- //banner -->

<!-- about -->
<div class="about py-5">
    <div class="container py-xl-5 py-lg-3">
        <h3 class="title text-capitalize font-weight-light text-dark text-center mb-5">Welcome to
            <span class="font-weight-bold">Myschool</span>
        </h3>
        <div class="row pt-md-4">
            <div class="col-lg-6 about_right">
                <h3 class="text-capitalize text-right font-weight-light font-italic">Buildup Your Baby's Carrier at
                    <span class="font-weight-bold">Myschool</span>
                </h3>
                <p class="text-right my-4 pr-4 border-right">Nestled amidst lush greenery, [My School] boasts state-of-the-art facilities designed to inspire learning, creativity, and personal growth. Our campus features modern classrooms equipped with the latest technology, providing students with immersive and dynamic learning experiences.</p>
                <div class="about_left-list">
                    <h6 class="mb-lg-3 mb-2 font-weight-bold text-dark">Our Benefits</h6>
                    <ul class="list-unstyled">
                        <li class="mb-2">
                            <i class="fas fa-check mr-3"></i>Specialized Curriculum</li>
                        <li class="mb-2">
                            <i class="fas fa-check mr-3"></i>Focus on Academic Excellence</li>
                        <li class="mb-2">
                            <i class="fas fa-check mr-3"></i>Unique Extracurricular Opportunities</li>
                        <li class="mb-2">
                            <i class="fas fa-check mr-3"></i>Strong Community and Networking</li>
                        <li class="mb-2">
                            <i class="fas fa-check mr-3"></i>Well-Maintained Facilities</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6 left-img-agikes mt-lg-0 mt-sm-4 mt-3 text-right">
                <img src="{{ asset('/') }}frontend/images/single-student.jpeg" alt="" class="img-fluid" />

                <div class="about-bottom text-center p-sm-5 p-4">
                    <ul>
                        <li>
                            <h5>60+</h5>
                            <p class="text-dark font-weight-bold">Teachers</p>
                        </li>
                        <li>
                            <h5>2000+</h5>
                            <p class="text-dark font-weight-bold">Students</p>
                        </li>
                        <li>
                            <h5>80+</h5>
                            <p class="text-dark font-weight-bold">Courses</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- //about -->


<!-- what we do -->
<div class="why-choose-agile py-5">
    <div class="container py-xl-5 py-lg-3">
        <h3 class="title text-capitalize font-weight-light text-white text-center mb-5">what we
            <span class="font-weight-bold">do</span>
        </h3>
        <div class="row agileits-w3layouts-grid pt-md-4">
            <div class="col-lg-4 services-agile-1">
                <div class="row wthree_agile_us">
                    <div class="col-lg-3 col-md-2 col-3  agile-why-text">
                        <div class="wthree_features_grid text-center p-3 border rounded">
                            <i class="fab fa-accusoft"></i>
                        </div>
                    </div>
                    <div class="col-9 agile-why-text-2">
                        <h4 class="text-capitalize text-white font-weight-bold mb-3">special education</h4>
                        <p>We offer specialized curricula focusing on specific educational philosophies, such as Montessori, Waldorf, or religious-based education.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 services-agile-1 my-lg-0 my-5">
                <div class="row wthree_agile_us">
                    <div class="col-lg-3 col-md-2 col-3  agile-why-text">
                        <div class="wthree_features_grid text-center p-3 border rounded">
                            <i class="fas fa-book"></i>
                        </div>
                    </div>
                    <div class="col-9 agile-why-text-2">
                        <h4 class="text-capitalize text-white font-weight-bold mb-3">full day session</h4>
                        <p>We maintain our all classes, exams, events in day session.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 services-agile-1">
                <div class="row wthree_agile_us">
                    <div class="col-lg-3 col-md-2 col-3  agile-why-text">
                        <div class="wthree_features_grid text-center p-3 border rounded">
                            <i class="fas fa-users"></i>
                        </div>
                    </div>
                    <div class="col-9 agile-why-text-2">
                        <h4 class="text-capitalize text-white font-weight-bold mb-3">qualified teachers</h4>
                        <p>We have rigorous hiring standards and may employ teachers with advanced degrees or specialized training in their subject areas.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row agileits-w3layouts-grid mt-5">
            <div class="col-lg-4 services-agile-1">
                <div class="row wthree_agile_us">
                    <div class="col-lg-3 col-md-2 col-3  agile-why-text">
                        <div class="wthree_features_grid text-center p-3 border rounded">
                            <i class="far fa-calendar-alt"></i>
                        </div>
                    </div>
                    <div class="col-9 agile-why-text-2">
                        <h4 class="text-capitalize text-white font-weight-bold mb-3">events</h4>
                        <p>Our versatile event spaces accommodate a range of gatherings, from intimate meetings to grand celebrations.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 services-agile-1  my-lg-0 my-5">
                <div class="row wthree_agile_us">
                    <div class="col-lg-3 col-md-2 col-3  agile-why-text">
                        <div class="wthree_features_grid text-center p-3 border rounded">
                            <i class="fas fa-graduation-cap"></i>
                        </div>
                    </div>
                    <div class="col-9 agile-why-text-2">
                        <h4 class="text-capitalize text-white font-weight-bold mb-3">pre class room</h4>
                        <p>Each classroom is meticulously decorated and furnished to create a luxurious and inviting learning environment</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 services-agile-1">
                <div class="row wthree_agile_us">
                    <div class="col-lg-3 col-md-2 col-3  agile-why-text">
                        <div class="wthree_features_grid text-center p-3 border rounded">
                            <i class="far fa-clock"></i>
                        </div>
                    </div>
                    <div class="col-9 agile-why-text-2">
                        <h4 class="text-capitalize text-white font-weight-bold mb-3">24/7 supports</h4>
                        <p>We prioritize providing all-time support facilities to our students, parents, and faculty.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- //what we do -->

@endsection

