@extends('admin.admin_master')

@section('title')
    Manage Exam Routine
@endsection

@section('content')
 <section class="content">
    <div class="container-fluid">
        <div class="row" id="top">
            <div class="col-sm-10 offset-sm-1">
                <div class="alert alert-success" style="display: none;"></div>
                <div class="card">
                    <div class="card-header">
                        <h4>Manage Exam Routine.</h4>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('admin.examination.routine.manage') }}" method="GET">

                            <div class="row">
                               <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Select  Class<span class="text-danger">*</span></label>
                                        <select name="clas_id" class="form-control">
                                            <option selected disabled>Select</option>
                                            @foreach ($classes as $class)
                                                <option value="{{ $class->id }}" {{ $class->id == Request::get('clas_id') ? 'selected':'' }}>{{ $class->class_name }}</option>
                                            @endforeach
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
                                         <label>Session<span class="text-danger">*</span></label>
                                         <select name="session_id" class="form-control">
                                             <option selected disabled>Select</option>
                                             @foreach ($sessions as $session)
                                                 <option value="{{ $session->id }}" {{ $session->id == Request::get('session_id') ? 'selected':'' }}>{{ $session->session_year }}</option>
                                             @endforeach
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
                            <div class="col-sm-3">
                              <span>Class:</span> <strong>{{ $class->class_name }}</strong>
                            </div>
                            <div class="col-sm-3">
                              <span>Exam:</span> <strong>{{ $exam->exam_name }}</strong>
                            </div>
                            <div class="col-sm-3">
                              <span>Session:</span> <strong>{{ $session->session_year }}</strong>
                            </div>
                            @if (count($routines)>0)
                               <div class="col-sm-3">
                                <a href="" class="btn btn-danger btn-sm" id="deleteAllSelectedRecord">Delete All Selected Record</a>
                               </div>
                            @endif
                         </div>{{-- row --}}
                     </div>

                     <div class="card-body">
                        @if (count($routines)>0)
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>
                                            <input type="checkbox" id="select_all_ids">
                                        </th>
                                        <th>Sl.</th>
                                        <th>Subject</th>
                                        <th>Time</th>
                                        <th>Room No.</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>


                                <tbody>
                                    @php
                                        $i=1;
                                    @endphp
                                    @foreach ($routines as $routine)
                                        <tr id="routine_ids{{ $routine->id }}">
                                            <td>
                                                <input type="checkbox" name="ids" class="checkbox_ids" value="{{ $routine->id }}">
                                            </td>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $routine->subject->subject }}</td>
                                            <td>
                                                {{ date('g:i a',strtotime($routine->start_time))  }}-{{ date('g:i a',strtotime($routine->end_time))  }}
                                            </td>
                                            <td>{{ $routine->room_no }}</td>
                                            <td>{{ date('d-m-Y',strtotime($routine->date)) }}</td>
                                            <td>
                                                <a href="{{ route('admin.examination.routine.edit',
                                                ['id'=>$routine->id,
                                                 'clas_id'=>Request::get('clas_id'),
                                                 'exam_id'=>Request::get('exam_id'),
                                                 'session_id'=>Request::get('session_id'),
                                                ]) }}" class="btn btn-info btn-sm" title="edit"><i class="fa fa-pen"></i></a>
                                                <a href="{{ route('admin.examination.routine.delete',$routine->id) }}" class="btn btn-danger btn-sm" onclick="confirmation(event)" title="delete"><i class="las la-trash"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        @endif
                     </div>
                  </div>
               </div>
            </div>{{-- row --}}
        @endif
    </div>
 </section>

 {{-- delete all selected record --}}
 <script>
    $(document).ready(function(){
        $('#select_all_ids').click(function(){
            $('.checkbox_ids').prop('checked',$(this).prop('checked'));
        });

        $('#deleteAllSelectedRecord').click(function(e){
            e.preventDefault();
            var all_ids = [];
            $('input:checkbox[name=ids]:checked').each(function(){
                all_ids.push($(this).val());
            });

          $.ajax({
            url:"{{ route('delete.multiple') }}",
            method:'POST',
            data:{ids:all_ids},
            success:function(response){
                //alert('success');
                // $('.alert').show();
                // $('.alert').html(response.status);
                 $.each(all_ids, function(index, id) {
                    $('#routine_ids' + id).remove();
                });

                 //$('.table').load(location.href+' .table');
                 updateSerialNumbers();

                 window.location.reload();


            },
          });
        });

        function updateSerialNumbers() {
        var $i = 1;
        $('.table tbody tr').each(function() {
            $(this).find('td:nth-child(2)').text($i++);
        });
    }
    });
</script>
 {{-- delete all selected record end --}}
@endsection


