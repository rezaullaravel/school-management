@extends('admin.admin_master')

@section('title')
    Class Routine
@endsection

@section('content')
 <section class="content">
    <div class="container-fluid pt-3">
        <div class="row">
            <div class="col-sm-10 offset-sm-1">
                @if (session('sms'))
                    <div class="alert alert-danger">
                        <p class="text-center">{{ Session::get('sms') }}</p>
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h4>Add Class Routine.
                            <a href="{{ route('admin.class.routine.view') }}" class="btn btn-info" style="float: right;">View Class Routine</a>
                        </h4>
                    </div>


                        <div class="card-body">
                          <form action="{{ route('admin.class.routine') }}" method="GET">

                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="">Class</label>
                                        <select name="clas_id"   class="form-control" required>
                                            <option value="" selected disabled>Select</option>
                                            @foreach ($classes as $class)
                                                <option value="{{ $class->id }}" {{ $class->id == Request::get('clas_id') ? 'selected':'' }}>{{ $class->class_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="">Subject</label>
                                        <select name="subject_id"   class="form-control" required>
                                            <option value="" selected disabled>Select</option>
                                            @foreach ($subjects as $subject)
                                                <option value="{{ $subject->id }}" {{ $subject->id == Request::get('subject_id') ? 'selected':'' }}>{{ $subject->subject }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for=""></label>
                                        <input type="submit" value="Search" class="btn btn-success btn-block" style="margin-top:7px;">
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for=""></label>
                                        <a href="{{ route('admin.class.routine') }}" class="btn btn-primary btn btn-block" style="margin-top:7px;">Reset</a>
                                    </div>
                                </div>
                            </div>{{-- row --}}
                          </form>
                        </div>
                </div>
            </div>
        </div>{{-- row --}}



          @if (!empty(Request::get('clas_id')) && !empty(Request::get('subject_id')))
            <div class="row">
                <div class="col-sm-10 offset-sm-1">
                    <div class="card">
                        <div class="card-header">
                            <div class="alert alert-success" style="display: none;">

                            </div>

                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.class.routine.insert') }}" method="POST">
                                @csrf
                                <table class="table table-bordered">
                                    <input type="hidden" name="clas_id" value="{{ Request::get('clas_id') }}">
                                    <input type="hidden" name="subject_id" value="{{ Request::get('subject_id') }}">
                                    <thead>
                                        <th>Week</th>
                                        <th>Start Time</th>
                                        <th>End Time</th>
                                        <th>Room No.</th>
                                    </thead>

                                    <tbody>
                                        @php
                                            $i = 1;
                                        @endphp
                                        @foreach ($weeks as $week)

                                        @php
                                            $routine = DB::table('class_routines')->where('clas_id',Request::get('clas_id'))->where('subject_id',Request::get('subject_id'))->where('week_id',$week->id)->first();
                                        @endphp
                                        <tr>
                                            <td>{{ $week->week_name }}</td>
                                            <td>
                                                <input type="time" name="routine[{{ $i }}][start_time]" value="{{ (!empty( $routine)) ? $routine->start_time :'' }}"   class="form-control">
                                                <input type="hidden" name="routine[{{ $i }}][week_id]" value="{{ $week->id }}">

                                            </td>
                                            <td>
                                                <input type="time" name="routine[{{ $i }}][end_time]" value="{{ (!empty( $routine)) ? $routine->end_time :'' }}"   class="form-control">
                                            </td>
                                            <td>
                                                <input type="text" name="routine[{{ $i }}][room_no]" value="{{ (!empty( $routine)) ? $routine->room_no :'' }}"   class="form-control">
                                            </td>
                                        </tr>
                                        @php
                                            $i++;
                                        @endphp
                                        @endforeach
                                    </tbody>
                                </table>

                                <div style="text-align:right; margin-top:5px;">
                                    @php
                                        $class_id = Request::get('clas_id');
                                        $subject_id = Request::get('subject_id');
                                    @endphp

                                    <input type="submit" value="Submit" class="btn btn-info">

                                </div>
                            </form>

                            <form action="{{ route('admin.class.routine.delete',['clas_id'=>$class_id,'subject_id'=>$subject_id]) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary" style="margin-top: -4rem;">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>{{-- row --}}
          @endif

    </div>
 </section>




@endsection
