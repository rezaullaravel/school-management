@extends('admin.admin_master')

@section('title')
    Class Routine View
@endsection

@section('content')
 <section class="content">
    <div class="container-fluid pt-3">
        <div class="row" id="top">
            <div class="col-sm-10 offset-sm-1">
                <div class="card">
                    <div class="card-header">
                        <h4>View Class Routine.
                            <a href="{{ url('admin/Class/routine') }}" class="btn btn-info" style="float: right;">Back</a>
                        </h4>
                    </div>


                        <div class="card-body">
                          <form action="{{ route('admin.class.routine.view') }}" method="GET">

                            <div class="row">
                                <div class="col-sm-4">
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

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for=""></label>
                                        <input type="submit" value="Search" class="btn btn-success btn-block" style="margin-top:7px;">
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
                        <div class="card-header">
                           <span>Class Routine,</span>
                           <span>Class:</span> <strong>Seven</strong>

                        </div>
                        <div class="card-body">
                                <table class="table table-bordered">

                                    <thead>
                                        <th>Week</th>

                                        <th>Subject</th>

                                    </thead>

                                    <tbody>
                                       @foreach ($weeks as $week)
                                           @php
                                                $routines = App\Models\ClassRoutine::where('clas_id',Request::get('clas_id'))->where('week_id',$week->id)->get();

                                            @endphp


                                            <tr>
                                                <td>{{ $week->week_name }}</td>

                                                <td>
                                                    @if ($week->id=='6' ||   $week->id=='7')
                                                        <strong>Off Day.</strong>
                                                        @else
                                                            @foreach ($routines  as $routine)
                                                            <strong>{{ $routine->subject->subject }}</strong>,

                                                            @if (empty($routine->start_time) || empty($routine->end_time))
                                                            <span>Time:--,</span>
                                                            @else
                                                            <span>Time:</span>
                                                            {{ date('g:i a',strtotime($routine->start_time))  }}-{{ date('g:i a',strtotime($routine->end_time))  }},
                                                            @endif

                                                            @if (empty($routine->room_no ))
                                                            <span>Room no:--</span>
                                                            @else
                                                            <span>Room no:</span>{{ $routine->room_no  }}
                                                            @endif

                                                            <?php echo '<br>';?>
                                                            <?php echo '<br>';?>

                                                            @endforeach
                                                    @endif

                                                </td>


                                             </tr>


                                       @endforeach
                                    </tbody>
                                </table>
                                <div style="text-align: right; margin-top:5px;">
                                    <button onclick="generatePDF()" class="btn btn-info" id="dload_btn">Download && Print Routine</button>

                                </div>
                        </div>
                    </div>
                </div>
            </div>{{-- row --}}
          @endif

    </div>
 </section>


<script>
    function generatePDF(){
        var btn = document.getElementById('dload_btn');
        btn.style.display='none';

        var top = document.getElementById('top');
        top.style.display='none';

        window.print();
        btn.style.display='block';
        btn.style.float='right';

    }
</script>





@endsection
