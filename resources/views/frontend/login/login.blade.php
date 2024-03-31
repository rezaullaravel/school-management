<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('login/style.css') }}">
    <link rel="stylesheet" href="{{ asset('login/bootstrap.css') }}">
</head>

<body class="bodyBackground">
    <!-- header -->
    {{-- <section class="back">
        <nav class="navbar navbar-expand-lg container mx-auto mb-5">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.html"> <img src="imgs/logo.png" style="width: 90px;"
                        alt="">হোম </a>
            </div>
        </nav>
    </section> --}}


    <br><br>
    <br><br>
    <br><br>
    <!-- login form -->
    <div class="container mx-auto mb-5">
        @if (session('sms'))
            <div class="alert alert-danger">
                <h4 class="text-center">{{ Session::get('sms') }}</h4>
            </div>
        @endif
        <div class="back formWidth p-4" style="border-radius: 20px;">
            <div class="text-bold text-center">Student Login</div>
            <img src="imgs/logo.png" style="width: 100px;" class="d-block mx-auto" alt="">
            <form action="{{ route('student.post.login') }}" method="post">
                <!-- radio button -->
                @csrf
                <!-- email or phone -->
                <div class="form-group mb-3">
                    <label for="contactInput">Email: *</label>
                    <div>
                        <input type="email" class="form-control" name="email" placeholder="আপনার ইমেইল">
                    </div>
                </div>

                <div class="mx-auto mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Password: *</label>
                    <input type="text" class="form-control" name="password" placeholder="আপনার পাসওয়ার্ড" required>
                    <!-- submit button -->
                    <div class="d-grid mb-3 gap-2">
                        <button type="submit" class="btn btn-success mt-3">লগইন করুন</button>
                    </div>

                    {{-- <p class="center-div">অথবা নিন্ম বর্ণিত সিস্টেমের মাধ্যমে লগইন করুন</p>
                    <span class="center-div d-flex">
                        <p class="mx-2">একাউন্ট নেই?</p> <a href="register.html">রেজিষ্টেশন করুন</a>
                    </span> --}}
                    <hr>
                    <span> <a href="{{ url('teacher/login') }}" class="text-success mx-3">Teacher Login</a> | <a
                            href="{{ url('guardian/login') }}" class="text-success mx-3">Guardian Login</a> </span>
                </div>

            </form>

        </div>

    </div>

    <!-- footer -->
    {{-- <section class="back mt-5 p-4">

        <div class="container mx-auto">
            <div class="row row-cols-1 row-cols-md-3 row-cols-lg-3 g-2">
                <!-- 1 -->
                <div class="col">
                    <p>পরিকল্পনা ও বাস্তবায়নে</p>
                    <img src="imgs/logo.png" style="width: 50px;" alt="">
                </div>
                <!-- 2 -->
                <div class="col">
                    <p>কপিরাইট © ২০২৪ সর্বস্বত্ব সংরক্ষিত</p>
                </div>
                <!-- 3 -->
                <div class="col">
                    <p>কারিগরি সহযোগিতায়</p>
                    <img src="imgs/logo.png" style="width: 50px;" alt="">
                </div>

            </div>
        </div>

    </section> --}}
    <!-- footer end -->
</body>

</html>
