@extends('admin.admin_master')

@section('title')
    View Exam Routine
@endsection

@section('content')
 <section class="content">
    <div class="container-fluid">
        <div class="row" id="top">
            <div class="col-sm-10 offset-sm-1">
                <div class="card">
                    <div class="card-header">
                        <h4>View Exam Routine.</h4>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('student.exam.routine.view') }}" method="GET">

                            <div class="row">
                               <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Your  Class<span class="text-danger">*</span></label>
                                        <select name="clas_id" class="form-control">
                                            <option value="{{ $class->id }}">{{ $class->class_name }}</option>

                                        </select>
                                        @error('clas_id')
                                          <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                               </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Examination<span class="text-danger">*</span></label>
                                        <select name="exam_id" class="form-control">
                                            <option selected disabled>Select</option>
                                            @foreach ($exams as $exam)
                                                <option value="{{ $exam->id }}" {{ $exam->id == Request::get('exam_id') ? 'selected':'' }}>{{ $exam->exam_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                     <div class="form-group">
                                         <label>Your Session<span class="text-danger">*</span></label>
                                         <select name="session_id" class="form-control">
                                             <option value="{{ $session->id }}">{{ $session->session_year }}</option>

                                         </select>

                                     </div>
                                </div>
                            </div>{{-- row --}}

                             <div class="row">
                                <div class="col-sm-12" style="text-align: right;">
                                    <input type="submit" value="Search" class="btn btn-info">
                                </div>
                             </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>{{-- row --}}

        @if(!empty(Request::get('clas_id')) && !empty(Request::get('exam_id')) && !empty(Request::get('session_id')))

            <div class="row">
               <div class="col-sm-10 offset-sm-1">
                  <div class="card">
                     <div class="card-header">
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="text-center text-danger">Exam Routine</h4>
                            </div>
                        </div>
                        @php
                           $class = DB::table('clas')->where('id',Request::get('clas_id'))->first();

                           $exam = DB::table('exams')->where('id',Request::get('exam_id'))->first();

                           $session = DB::table('sessions')->where('id',Request::get('session_id'))->first();
                        @endphp
                        <div class="row">
                            <div class="col-sm-4">
                              <span>Class:</span> <strong>{{ $class->class_name }}</strong>
                            </div>
                            <div class="col-sm-4">
                              <span>Exam:</span> <strong>{{ $exam->exam_name }}</strong>
                            </div>
                            <div class="col-sm-4">
                              <span>Session:</span> <strong>{{ $session->session_year }}</strong>
                            </div>
                         </div>{{-- row --}}
                     </div>

                     <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Subject</th>
                                    <th>Time</th>
                                    <th>Room No.</th>
                                    <th>Date</th>
                                </tr>
                            </thead>

                            @if (!empty($routines))
                                @foreach ($routines as $routine)
                                   <tr>
                                     <td>{{ $routine->subject->subject }}</td>
                                     <td>
                                        {{ date('g:i a',strtotime($routine->start_time))  }}-{{ date('g:i a',strtotime($routine->end_time))  }}
                                    </td>
                                    <td>{{ $routine->room_no }}</td>
                                    <td>{{ date('d-m-Y',strtotime($routine->date)) }}</td>
                                   </tr>
                                @endforeach
                            @endif
                        </table>
                     </div>
                  </div>
               </div>
            </div>{{-- row --}}
        @endif

       @if (count($routines)>0)
       <div class="row" style="text-align: right; margin-bottom:5px;">
        <div class="col-sm-10 offset-sm-1">
            <button class="btn btn-info" id="download" onclick="downloadRoutine();">Download && Print</button>
        </div>
    </div>
       @endif
    </div>
 </section>

 <script>
    function downloadRoutine(){
        document.getElementById('download').style.display='none';
        document.getElementById('top').style.display='none';
        window.print();
        document.getElementById('download').style.display='block';
        document.getElementById('download').style.float='right';
        document.getElementById('top').style.display='block';
        // document.getElementById('download').style.marginBottom='5px';
    }
 </script>
@endsection


