@extends('admin.admin_master')

@section('title')
    Fees Total
@endsection

@section('content')
 <section class="content">
    <div class="container-fluid pt-3">
            <div class="row">
                <div class="col-sm-10 offset-sm-1">
                    <div class="card">
                        <div class="card-header">
                            <form action="{{ route('admin.total.fee') }}" method="GET">
                                @csrf
                                <div class="row mt-3">
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

                                    <div class="col-sm-3" style="margin-top: 30px;">
                                       <div class="form-group">
                                          <input type="submit" value="Filter" class="btn btn-info form-control">
                                       </div>
                                    </div>
                                 </div>{{-- row --}}
                            </form>

                        </div>
                        <div class="card-body">
                                @if (count($total_fees)>0)
                                <div class="row">
                                    <div class="col-sm-4">
                                        @php
                                            $class = App\Models\Clas::where('id',Request::get('clas_id'))->first();
                                            $section = App\Models\Section::where('id',Request::get('section_id'))->first();
                                            $session = App\Models\SessionModel::where('id',Request::get('session_id'))->first();
                                        @endphp

                                        <span>Class:</span> <strong>{{ $class->class_name }} (Total Fee)</strong>
                                    </div>
                                    <div class="col-sm-4">
                                        <span>Section:</span> <strong>{{ $section?->section_name }}</strong>
                                    </div>
                                    <div class="col-sm-4">
                                        <span>Session:</span> <strong>{{ $session->session_year }}</strong>
                                    </div>
                                </div>
                                <table class="table table-bordered table-responsive mt-3">
                                    <thead>
                                       <tr class="text-center">
                                        <th>January</th>
                                        <th>February</th>
                                        <th>March</th>
                                        <th>April</th>
                                        <th>May</th>
                                        <th>June</th>
                                        <th>July</th>
                                        <th>August</th>
                                        <th>September</th>
                                        <th>October</th>
                                        <th>November</th>
                                        <th>December</th>
                                       </tr>
                                    </thead>

                                    <tbody>
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

                                          <tr class="text-center">
                                            @foreach ($total_fees as  $row)

                                                @php
                                                  $january_fee = $row->january;
                                                   $sum_january = $sum_january +   $january_fee ;
                                                @endphp

                                                @php
                                                $february_fee = $row->february;
                                                $sum_february = $sum_february + $february_fee;
                                                @endphp

                                                @php
                                                $march_fee = $row->march;
                                                $sum_march = $sum_march + $march_fee;
                                                @endphp

                                                @php
                                                $april_fee = $row->april;
                                                $sum_april = $sum_april + $april_fee;
                                                @endphp

                                                @php
                                                $may_fee = $row->may;
                                                $sum_may = $sum_may + $may_fee;
                                                @endphp

                                                @php
                                                $june_fee = $row->june;
                                                $sum_june = $sum_june + $june_fee;
                                                @endphp

                                                @php
                                                $july_fee = $row->july;
                                                $sum_july = $sum_july + $july_fee;
                                                @endphp

                                                @php
                                                $august_fee = $row->august;
                                                $sum_august = $sum_august + $august_fee;
                                                @endphp

                                                @php
                                                $september_fee = $row->september;
                                                $sum_september = $sum_september + $september_fee;
                                                @endphp

                                                @php
                                                $october_fee = $row->october;
                                                $sum_october = $sum_october + $october_fee;
                                                @endphp

                                                @php
                                                $november_fee = $row->november;
                                                $sum_november = $sum_november + $november_fee;
                                                @endphp

                                                @php
                                                $december_fee = $row->december;
                                                $sum_december = $sum_december + $december_fee;
                                                @endphp

                                            @endforeach

                                            <td>{{ $sum_january }}</td>
                                            <td>{{ $sum_february }}</td>
                                            <td>{{ $sum_march }}</td>
                                            <td>{{ $sum_april }}</td>
                                            <td>{{ $sum_may }}</td>
                                            <td>{{ $sum_june }}</td>
                                            <td>{{ $sum_july }}</td>
                                            <td>{{ $sum_august }}</td>
                                            <td>{{ $sum_september }}</td>
                                            <td>{{ $sum_october }}</td>
                                            <td>{{ $sum_november }}</td>
                                            <td>{{ $sum_december }}</td>
                                          </tr>

                                    </tbody>
                                </table>
                                @endif
                        </div>
                    </div>
                </div>
            </div>{{-- row --}}
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

@endsection
