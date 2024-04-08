<div class="navigation-w3ls">
    <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-nav">
        <button class="navbar-toggler mx-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
         aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse text-center" id="navbarSupportedContent">
            <ul class="navbar-nav justify-content-center">
                <li class="nav-item active">
                    <a class="nav-link text-white" href="{{ url('/') }}">Home
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="about.html">About Us</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Pages
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="about.html">Teachers</a>
                        <a class="dropdown-item" href="index.html">Students</a>
                        <a class="dropdown-item" href="{{ route('student.admission') }}">Admission</a>
                        <a class="dropdown-item" href="{{ route('student.result') }}">Result</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="contact.html">Contact Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="contact.html">Notice</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="contact.html">Headmaster's Message</a>
                </li>
            </ul>
        </div>
    </nav>
</div>
