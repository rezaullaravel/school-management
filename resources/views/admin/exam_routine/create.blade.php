@extends('admin.admin_master')

@section('title')
    Add Exam Routine
@endsection

@section('content')
 <section class="content">
    .<div class="container-fluid">
        <div class="row">
            <div class="col-sm-10 offset-sm-1">
                @if (session('sms'))
                  <div class="alert alert-danger">
                    <p class="text-center">{{ Session::get('sms') }}</p>
                  </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h4>Create Exam Routine.
                            <a href="{{ route('admin.exam-routine.view') }}" class="btn btn-primary" style="float: right;"></i>View Exam Routine</a>
                        </h4>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('admin.exam-routine.store') }}" method="POST">
                            @csrf
                            <div class="row">
                               <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Select  Class<span class="text-danger">*</span></label>
                                        <select name="clas_id" class="form-control">
                                            <option selected disabled>Select</option>
                                            @foreach ($classes as $class)
                                                <option value="{{ $class->id }}">{{ $class->class_name }}</option>
                                            @endforeach
                                        </select>
                                        @error('clas_id')
                                          <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                               </div>
                               <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Select  Subject<span class="text-danger">*</span></label>
                                        <select name="subject_id" class="form-control">
                                            <option selected disabled>Select</option>
                                            @foreach ($subjects as $subject)
                                                <option value="{{ $subject->id }}">{{ $subject->subject }}</option>
                                            @endforeach
                                        </select>

                                        @error('subject_id')
                                         <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                               </div>
                            </div>{{-- row --}}

                            <div class="row">
                                <div class="col-sm-6">
                                     <div class="form-group">
                                         <label>Examination<span class="text-danger">*</span></label>
                                         <select name="exam_id" class="form-control">
                                             <option selected disabled>Select</option>
                                             @foreach ($exams as $exam)
                                                 <option value="{{ $exam->id }}">{{ $exam->exam_name }}</option>
                                             @endforeach
                                         </select>

                                         @error('exam_id')
                                           <span class="text-danger">{{ $message }}</span>
                                         @enderror
                                     </div>
                                </div>
                                <div class="col-sm-6">
                                     <div class="form-group">
                                         <label>Session<span class="text-danger">*</span></label>
                                         <select name="session_id" class="form-control">
                                             <option selected disabled>Select</option>
                                             @foreach ($sessions as $session)
                                                 <option value="{{ $session->id }}">{{ $session->session_year }}</option>
                                             @endforeach
                                         </select>

                                         @error('session_id')
                                           <span class="text-danger">{{ $message }}</span>
                                         @enderror
                                     </div>
                                </div>
                             </div>{{-- row --}}

                             <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Room No.<span class="text-danger">*</span></label>
                                        <input type="text" name="room_no" class="form-control">

                                        @error('room_no')
                                          <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Start Time<span class="text-danger">*</span></label>
                                        <input type="time" name="start_time" class="form-control">

                                         @error('start_time')
                                           <span class="text-danger">{{ $message }}</span>
                                         @enderror
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>End Time<span class="text-danger">*</span></label>
                                        <input type="time" name="end_time" class="form-control">

                                        @error('end_time')
                                          <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                             </div>{{-- row --}}

                             <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Exam Date<span class="text-danger">*</span></label>
                                        <input type="date" name="date" class="form-control">

                                         @error('date')
                                           <span class="text-danger">{{ $message }}</span>
                                         @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6" style="text-align: right; margin-top:2rem;">
                                    <input type="submit" value="Submit" class="btn btn-info">
                                </div>
                             </div>




                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
 </section>
@endsection
