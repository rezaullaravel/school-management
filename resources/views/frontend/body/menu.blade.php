<div class="navigation-w3ls">
    <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-nav">
        <button class="navbar-toggler mx-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
         aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse text-center" id="navbarSupportedContent">
            <ul class="navbar-nav justify-content-center">
                <li class="nav-item {{ request()->is('/') ? 'active' : '' }}">
                    <a class="nav-link text-white" href="{{ url('/') }}">Home
                        <span class="sr-only">(current)</span>
                    </a>
                </li>

                <li class="nav-item dropdown {{ request()->is('page*') ? 'active' : '' }}">
                    <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Pages
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item {{ request()->is('page/teachers') ? 'active' : '' }}" href="{{ route('frontend.teachers') }}">Teachers</a>
                        <a class="dropdown-item {{ request()->is('page/students') ? 'active' : '' }}" href="{{ route('frontend.students') }}">Students</a>
                        <a class="dropdown-item {{ request()->is('page/student/admission') ? 'active' : '' }}" href="{{ route('student.admission') }}">Admission</a>
                        <a class="dropdown-item {{ request()->is('page/student/result') ? 'active' : '' }}" href="{{ route('student.result') }}">Result</a>
                    </div>
                </li>

                <li class="nav-item {{ request()->is('view_notice') ? 'active':'' }}">
                    <a class="nav-link text-white" href="{{ route('view.notice') }}">Notice</a>
                </li>
                <li class="nav-item {{ request()->is('view_description') ? 'active':'' }}">
                    <a class="nav-link text-white" href="{{ route('view.principalDescription') }}">Headmaster's Message</a>
                </li>
                <li class="nav-item {{ request()->is('contact/us') ? 'active':'' }}">
                    <a class="nav-link text-white" href="{{ route('contact.us') }}">Contact Us</a>
                </li>
                <li class="nav-item {{ request()->is('about/us') ? 'active':'' }}">
                    <a class="nav-link text-white" href="{{ route('about.us') }}">About Us</a>
                </li>
            </ul>
        </div>
    </nav>
</div>
