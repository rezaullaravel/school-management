@extends('admin.admin_master')

@section('title')
    Fees Collection Report
@endsection

@section('content')
 <section class="content">
    <div class="container-fluid pt-3">
        <div class="row" id="top">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Fees Collection Report.</h4>
                    </div>


                        <div class="card-body">
                          <form action="{{ route('admin.fees.collection.report') }}" method="GET">

                            <div class="row">

                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="">Class</label>
                                        <select name="clas_id"   class="form-control" required>
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
                                        <select name="section_id"   class="form-control">
                                            <option value="" selected disabled>Select</option>

                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="">Session</label>
                                        <select name="session_id"   class="form-control" required>
                                            <option value="" selected disabled>Select</option>
                                            @foreach ($sessions as $session)
                                                <option value="{{ $session->id }}">{{ $session->session_year }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="">Month</label>
                                        <select name="month"   class="form-control" required>
                                            <option value="" selected disabled>Select</option>
                                            <option value="january">January</option>
                                            <option value="february">February</option>
                                            <option value="march">March</option>
                                            <option value="april">April</option>
                                            <option value="may">May</option>
                                            <option value="june">June</option>
                                            <option value="july">July</option>
                                            <option value="august">August</option>
                                            <option value="september">September</option>
                                            <option value="october">October</option>
                                            <option value="november">November</option>
                                            <option value="december">December</option>
                                        </select>
                                    </div>
                                </div>

                            </div>{{-- row --}}



                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group text-right">
                                        <label for=""></label>
                                        <a href="{{ route('admin.fees.collection.report') }}" class="btn btn-primary">Reset</a>
                                        <input type="submit" value="Submit"   class="btn btn-info">
                                    </div>
                                </div>
                            </div>
                          </form>
                        </div>
                </div>
            </div>
        </div>{{-- row --}}

        @if (count($students)>0)
           <div class="card">
              <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="text-center mb-3">Sherkole S.A High School</h4>
                        <h5 class="text-center">Fees Collection Report</h5>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-sm-3">
                        @php
                            $class = App\Models\Clas::where('id',Request::get('clas_id'))->first();
                            $section = App\Models\Section::where('id',Request::get('section_id'))->first();
                            $session = App\Models\SessionModel::where('id',Request::get('session_id'))->first();
                        @endphp

                        <span>Class:</span> <strong>{{ $class->class_name }} </strong>
                    </div>
                    <div class="col-sm-3">
                        <span>Section:</span> <strong>{{ $section?->section_name }}</strong>
                    </div>
                    <div class="col-sm-3">
                        <span>Session:</span> <strong>{{ $session->session_year }}</strong>
                    </div>

                    <div class="col-sm-3">
                        <span>Month:</span> <strong>{{ Request::get('month') }}</strong>
                    </div>
                  </div>
              </div>

              <div class="row">
                 <div class="col-sm-12">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">Sl</th>
                                <th class="text-center">Student Name</th>
                                <th class="text-center">Registration</th>
                                <th class="text-center">Given Amount</th>
                                <th class="text-center">Total Fee</th>
                                <th class="text-center">Due</th>
                            </tr>
                        </thead>

                        <tbody>
                            @php


                            @endphp
                            @foreach ($students as $key=>$student)
                               <tr class="text-center">
                                  <td>{{ $key+1 }}</td>
                                  <td>{{ $student->name }}</td>
                                  <td>{{ $student->registration }}</td>
                                        @php
                                          $sum = 0;
                                            $fees = DB::table('fees_collections')->where('registration',$student->registration)->where('month',Request::get('month'))->get();
                                         @endphp

                                            @foreach ($fees as $fee)
                                            @php
                                                $sum = $sum + $fee->given_amount;
                                            @endphp
                                            @endforeach


                                      <td>{{ $sum }}</td>
                                      {{-- total fee calculation start--}}
                                      @if (Request::get('section_id')==null)
                                         @php
                                             $amounts = App\Models\Fee::where('clas_id', Request::get('clas_id'))
                                            ->where('session_id', Request::get('session_id'))
                                            ->get();
                                         @endphp
                                      @else
                                         @php
                                             $amounts = App\Models\Fee::where('clas_id', Request::get('clas_id'))
                                            ->where('section_id', Request::get('section_id'))
                                            ->where('session_id', Request::get('session_id'))
                                            ->get();
                                         @endphp
                                      @endif

                                      @php

                                              $sum_january = 0;
                                                $sum_february = 0;
                                                $sum_march = 0;
                                                $sum_april = 0;
                                                $sum_may = 0;
                                                $sum_june = 0;
                                                $sum_july = 0;
                                                $sum_august = 0;
                                                $sum_september = 0;
                                                $sum_october = 0;
                                                $sum_november = 0;
                                                $sum_december = 0;

                                      @endphp

                                      @foreach ($amounts as $fee)
                                         @php
                                              $sum_january = $sum_january + $fee->january;

                                            $sum_february = $sum_february + $fee->february;

                                            $sum_march = $sum_march + $fee->march;

                                        $sum_april = $sum_april + $fee->april;

                                        $sum_may = $sum_may + $fee->may;

                                        $sum_june = $sum_june + $fee->june;

                                        $sum_july = $sum_july + $fee->july;

                                        $sum_august = $sum_august + $fee->august;

                                        $sum_september = $sum_september + $fee->september;

                                        $sum_october = $sum_october + $fee->october;

                                        $sum_november = $sum_november + $fee->november;

                                        $sum_december = $sum_december + $fee->december;
                                         @endphp
                                      @endforeach
                                      {{-- total fee calculation end--}}

                                     <td>
                                        @if (Request::get('month') == 'january')
                                        {{ $sum_january }}
                                        @elseif (Request::get('month') == 'february')
                                            {{ $sum_february }}
                                        @elseif (Request::get('month') == 'march')
                                            {{ $sum_march }}
                                        @elseif (Request::get('month') == 'april')
                                            {{ $sum_april }}
                                        @elseif (Request::get('month') == 'may')
                                            {{ $sum_may }}
                                        @elseif (Request::get('month') == 'june')
                                            {{ $sum_june }}
                                        @elseif (Request::get('month') == 'july')
                                            {{ $sum_july }}
                                        @elseif (Request::get('month') == 'august')
                                            {{ $sum_august }}
                                        @elseif (Request::get('month') == 'september')
                                            {{ $sum_september }}
                                        @elseif (Request::get('month') == 'october')
                                            {{ $sum_october }}
                                        @elseif (Request::get('month') == 'november')
                                            {{ $sum_november }}
                                        @elseif (Request::get('month') == 'december')
                                        {{ $sum_december }}

                                        @endif

                                     </td>
                                     <td>
                                        @if (Request::get('month') == 'january')
                                        {{ $sum_january -$sum }}
                                        @elseif (Request::get('month') == 'february')
                                            {{ $sum_february -$sum }}
                                        @elseif (Request::get('month') == 'march')
                                            {{ $sum_march -$sum }}
                                        @elseif (Request::get('month') == 'april')
                                            {{ $sum_april -$sum }}
                                        @elseif (Request::get('month') == 'may')
                                            {{ $sum_may -$sum }}
                                        @elseif (Request::get('month') == 'june')
                                            {{ $sum_june -$sum }}
                                        @elseif (Request::get('month') == 'july')
                                            {{ $sum_july -$sum }}
                                        @elseif (Request::get('month') == 'august')
                                            {{ $sum_august -$sum }}
                                        @elseif (Request::get('month') == 'september')
                                            {{ $sum_september -$sum }}
                                        @elseif (Request::get('month') == 'october')
                                            {{ $sum_october -$sum }}
                                        @elseif (Request::get('month') == 'november')
                                            {{ $sum_november -$sum }}
                                        @elseif (Request::get('month') == 'december')
                                        {{ $sum_december -$sum }}

                                        @endif

                                     </td>

                               </tr>

                            @endforeach
                        </tbody>
                    </table>
                    <div class="text-right mb-3">
                        <button class="btn btn-primary" id="download" onclick="downloadReport();">Download</button>
                    </div>
                 </div>
              </div>
           </div>
        @endif





    </div>
 </section>


 {{-- javascript for section auto select --}}
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

{{-- download fees collection report --}}
<script>
    function downloadReport(){
        document.getElementById('download').style.display='none';
        document.getElementById('top').style.display='none';
        window.print();
         document.getElementById('download').style.display='block';
         document.getElementById('download').style.float='right';
         document.getElementById('top').style.display='block';
         document.getElementById('download').style.marginBottom='10px';
    }
 </script>

@endsection
