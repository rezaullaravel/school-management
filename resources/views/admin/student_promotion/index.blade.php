@extends('admin.admin_master')

@section('title')
    Student Promotion
@endsection

@section('content')
 <section class="content">
    <div class="container-fluid pt-3">
        <div class="row">
            <div class="col-sm-10 offset-sm-1">
                <div class="card">
                    <div class="card-header">
                        <h4>Student Promotion.</h4>
                    </div>


                        <div class="card-body">
                          <form action="{{ route('admin.student_promotion') }}" method="GET">

                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="">Class</label>
                                        <select name="clas_id" id="class_id"   class="form-control" required>
                                            <option value="" selected disabled>Select</option>
                                            @foreach ($classes as $class)
                                                <option value="{{ $class->id }}">{{ $class->class_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="">Section</label>
                                        <select name="section_id" id="section_id"  class="form-control">
                                            <option value=""  disabled>Select</option>

                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group">
                                       <label for="">Session</label>
                                       <select name="session_id"  class="form-control" required>
                                        <option value="" selected disabled>Select</option>
                                        @foreach ($sessions as $session)
                                            <option value="{{ $session->id }}" {{ Request::get('session_id') == $session->id ? 'selected':'' }}> {{ $session->session_year }} </option>
                                        @endforeach
                                    </select>
                                    </div>
                                  </div>

                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for=""></label>
                                        <input type="submit" value="submit" class="btn btn-success btn-block" style="margin-top:7px;">
                                    </div>
                                </div>

                            </div>{{-- row --}}

                          </form>
                        </div>
                </div>
            </div>
        </div>{{-- row --}}



          @if (!empty(Request::get('clas_id')))

          <div class="row">
            <div class="col-sm-10 offset-sm-1">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                @php
                                    $class = App\Models\Clas::where('id',Request::get('clas_id'))->first();
                                @endphp
                                Class: <strong>{{ $class->class_name }}</strong>
                            </div>
                            <div class="col-sm-3">
                                @php
                                $section = App\Models\Section::where('id',Request::get('section_id'))->first();
                                @endphp
                                Section: <strong>{{ $section?->section_name  }}</strong>
                            </div>
                            <div class="col-sm-3">
                                @php
                                $session = App\Models\SessionModel::where('id',Request::get('session_id'))->first();
                                @endphp
                                Session: <strong>{{  $session->session_year }}</strong>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-10 offset-sm-1">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.promotion.insert') }}" method="POST">
                            @csrf

                            <div class="col-sm-3">
                                @php
                                    $promotion_classes = App\Models\Clas::where('id','!=',Request::get('clas_id'))->get();
                                @endphp
                                <div class="form-group">
                                    <label for="">Promoted To</label>
                                    <select name="class_id"    class="form-control" required>
                                        <option value="" selected disabled>Select Class</option>
                                        @foreach ($promotion_classes as $class)
                                            <option value="{{ $class->id }}">{{ $class->class_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <table  class="table table-bordered">
                                <thead>
                                    <th>Sl</th>
                                    <th>Student Name</th>
                                    <th>Roll</th>
                                    <th>Reg.</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>

                                   @php
                                       $i=1;
                                   @endphp
                                    @foreach($students as $index => $student)
                                        <tr>
                                            <td>{{ $index+1 }}</td>
                                            <td>{{ $student->name }}</td>
                                            <td>{{ $student->roll }}</td>
                                            <td>{{ $student->registration }}</td>

                                            <td>
                                                <input type="checkbox" name="promotion[{{ $i }}][status]"
                                               value="promoted"
                                                > Give Promotion

                                                <input type="hidden" name="promotion[{{ $i }}][student_id]" value="{{ $student->id }}">
                                            </td>
                                            @php
                                                $i++;
                                            @endphp
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>


                            <div class="row">
                                <div class="col-sm-12">
                                    <input type="submit" value="Give Promotion" class="btn btn-success" style="float: right;">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
          </div> {{-- end row --}}
          @endif



    </div>
 </section>





{{-- js for section auto select --}}
 <script type="text/javascript">
    $(document).ready(function(){
        $('select[name="clas_id"]').on('change',function(){
            var class_id=$(this).val();
            if(class_id){
                $.ajax({
                    url:"{{ url('/admin/class/section/ajax') }}/"+class_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data){
                        var d=$('select[name="section_id"]').empty();
                        $.each(data,function(key,value){
                            $('select[name="section_id"]').append(
                                '<option value="'+value.id+'">'+
                                value.section_name+'</option>');
                        });
                    },
                });
            }else{
                alert('danger');
            }
        });
    });
</script>
{{-- javascript for section auto select end --}}









@endsection
