@extends('frontend.frontend_master')

@section('title')
Student Result
@endsection

@section('content')

<div class="banner-agile">

    @include('frontend.body.menu')
    <div class="form-w3l py-5">
		<div class="container py-xl-5 py-lg-3">
			<h3 class="title text-capitalize font-weight-light text-dark text-center mb-5">Student
				<span class="font-weight-bold">Result</span>
			</h3>
			<div class="register-form pt-md-4">
				<form action="{{ route('student.get-result') }}" method="GET">
					<div class="styled-input form-group">
                        <input type="text" name="roll"  class="form-control" placeholder="Enter Student Roll..." required>
					</div>

					<div class="styled-input agile-styled-input-top form-group">
                        <select name="clas_id"  class="category2" required>
                            <option value="" selected disabled>Select Class</option>
                            @foreach ($classes as $class)
                                <option value="{{ $class->id }}"> {{ $class->class_name }}</option>
                            @endforeach
                        </select>
					</div>

                    <div class="styled-input agile-styled-input-top form-group">
                        <select name="session_id"  class="form-control" required>
                            <option value="" selected disabled>Select Session</option>
                            @foreach ($sessions as $session)
                                <option value="{{ $session->id }}"> {{ $session->session_year }} </option>
                            @endforeach
                        </select>
					</div>

                    <div class="styled-input agile-styled-input-top form-group">
                        <select name="exam_id"  class="form-control" required>
                            <option value="" selected disabled>Select Exam</option>
                            @foreach ($exams as $exam)
                                <option value="{{ $exam->id }}"> {{ $exam->exam_name }}</option>
                            @endforeach
                        </select>
					</div>

					<input type="submit" value="Submit">
				</form>
			</div>
		</div>
	</div>

</div>{{-- banner agile --}}


@endsection
