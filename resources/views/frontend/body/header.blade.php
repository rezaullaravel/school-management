<header>
    <!-- top header -->
    <div class="top-head-w3ls py-2 bg-dark">
        <div class="container">
            <div class="row">
                <h1 class="text-capitalize text-white col-7">
                    <i class="fas fa-book text-dark bg-white p-2 rounded-circle mr-3"></i>{{   $setting->title }}</h1>
                <!-- social icons -->
                <div class="social-icons text-right col-5" id="sicon">
                    <ul class="list-unstyled">
                        <li>
                            <a href="#" class="fab fa-facebook-f icon-border facebook rounded-circle"> </a>
                        </li>
                        <li class="mx-2">
                            <a href="#" class="fab fa-twitter icon-border twitter rounded-circle"> </a>
                        </li>
                        <li>
                            <a href="#" class="fab fa-google-plus-g icon-border googleplus rounded-circle"> </a>
                        </li>
                        <li class="ml-2">
                            <a href="#" class="fas fa-rss icon-border rss rounded-circle"> </a>
                        </li>
                    </ul>
                </div>
                <!-- //social icons -->
            </div>
        </div>
    </div>
    <!-- //top header -->
    <!-- middle header -->
    <div class="middle-w3ls-nav py-2">
        <div class="container">
            <div class="row">
                <a class="logo font-italic font-weight-bold col-lg-4 text-lg-left text-center" href="{{ url('/') }}">Myschool</a>
                <div class="col-lg-8 right-info-agiles mt-lg-0 mt-sm-3 mt-1">
                    <div class="row">
                        <div class="col-sm-4  nav-middle">
                            <i class="far fa-envelope-open text-center mr-md-4 mr-sm-2 mr-4"></i>
                            <div class="agile-addresmk">
                                <p>
                                    <span class="font-weight-bold text-dark">Mail Us</span>
                                    <a href="mailto:mail@example.com">info@myschool.com</a>
                                </p>
                            </div>
                        </div>
                        <div class="col-sm-4 col-6 nav-middle mt-sm-0 mt-2">
                            <i class="fas fa-phone-volume text-center mr-md-4 mr-sm-2 mr-4"></i>
                            <div class="agile-addresmk">
                                <p>
                                    <span class="font-weight-bold text-dark">Call Us</span>
                                    +8801719475187
                                </p>
                            </div>
                        </div>
                        <div class="col-sm-4 col-6 top-login-butt text-right mt-sm-2">
                            @if (Session::get('adminId'))
                            <a href="" class="button-head-mow3 text-white" style="display: none;" data-toggle="modal" data-target="#loginModal" id="loginBtn">Login</a>

                            @elseif(Session::get('teacherId'))
                            <a href="" class="button-head-mow3 text-white" style="display: none;" data-toggle="modal" data-target="#loginModal" id="loginBtn">Login</a>

                            @elseif(Session::get('studentId'))
                            <a href="" class="button-head-mow3 text-white" style="display: none;" data-toggle="modal" data-target="#loginModal" id="loginBtn">Login</a>

                            @elseif(Session::get('guardianId'))
                            <a href="" class="button-head-mow3 text-white" style="display: none;" data-toggle="modal" data-target="#loginModal" id="loginBtn">Login</a>
                            @else
                            <a href="" class="button-head-mow3 text-white"  data-toggle="modal" data-target="#loginModal" id="loginBtn">Login</a>
                            @endif

                            @if (Session::get('adminId'))
                            <a href="{{ url('admin/dashboard') }}" class="button-head-mow3 text-white" title="Go To Dashboard">Dashboard<i class="las la-angle-double-right"></i></a>
                            @endif

                            @if (Session::get('teacherId'))
                            <a href="{{ url('teacher/dashboard') }}" class="button-head-mow3 text-white" title="Go To Dashboard">Dashboard<i class="las la-angle-double-right"></i></a>
                            @endif

                            @if (Session::get('studentId'))
                            <a href="{{ url('student/dashboard') }}" class="button-head-mow3 text-white" title="Go To Dashboard">Dashboard<i class="las la-angle-double-right"></i></a>
                            @endif

                            @if (Session::get('guardianId'))
                            <a href="{{ url('guardian/dashboard') }}" class="button-head-mow3 text-white" title="Go To Dashboard">Dashboard<i class="las la-angle-double-right"></i></a>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- //middle header -->
</header>


{{-- modal start --}}
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Administrative Panel</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="card">
            <div class="card-body">
                <a href="{{ url('admin/login') }}" class="btn btn-info form-control">Admin Login</a> <br><br>
                <a href="{{ url('teacher/login') }}" class="btn btn-primary form-control">Teacher Login</a><br><br>
                <a href="{{ url('student/login') }}" class="btn btn-secondary form-control">Student Login</a><br><br>
                <a href="{{ url('guardian/login') }}" class="btn btn-success form-control">Guardian Login</a>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
{{-- modal end --}}
