<div class="top-header">
    <div class="row">
        <div class="col-md-6 col-sm-6 col-12">
            <div class="link">
                <a href="#">সুবর্ণ জয়ন্তী ও বঙ্গবন্ধু কর্ণার</a>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-12">
            <div class="links">
                <ul>
                    <li><a href="{{ route('student.result') }}">Result</a></li>



                    @if (Session::get('studentId'))
                        <li><a href="{{ route('student.dashboard') }}">Student Dashboard</a></li>
                    @elseif (Session::get('teachertId'))
                        <li><a href="{{ route('teacher.dashboard') }}"> Teacher Dashboard</a></li>
                    @elseif (Session::get('guardianId'))
                        <li><a href="{{ route('student.dashboard') }}"> Guardian Dashboard</a></li>
                    @else
                        <li>
                            <a href="{{ route('student.admission') }}" type="button" class="btn btn-primary"
                                style="background: #112182">
                                Admission
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('frontend.login') }}" class="btn btn-primary" style="background: #112182">
                                Login
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <a href="{{ route('student.login') }}" class="btn btn-primary btn-block">Student Login</a>

                <h4>OR<h4>

                        <a href="{{ url('teacher/login') }}" class="btn btn-primary btn-block">Teacher Login</a>


                        <h4>OR</h4>


                        <a href="{{ url('guardian/login') }}" class="btn btn-primary btn-block">Guardian Login</a>
            </div>



        </div>
    </div>
</div>
<!-- Modal End -->
