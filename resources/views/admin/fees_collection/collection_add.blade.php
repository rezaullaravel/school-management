@extends('admin.admin_master')

@section('title')
    Fees Collection Add
@endsection

@section('content')
 <section class="content">
    <div class="container-fluid pt-3">

            <div class="row">
                <div class="col-sm-10 offset-sm-1">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-sm-12">

                                    @php
                                    $total_fees = DB::table('fees')->where('class_id',$student->clas_id)->where('status',1)->get();
                                    $total = 0;
                                    @endphp

                                    @foreach ($total_fees as $fees)
                                            @php
                                                $total = $total + $fees->fees_amount;
                                            @endphp
                                    @endforeach

                                    <h4>
                                        @php
                                            $class_id = $student->clas_id;
                                            $session_id = $student->session_id;
                                            $student_id = $student->id;
                                        @endphp
                                        <a href="{{ route('admin.insert.collection',[
                                            'student_id'=>$student_id,
                                            'class_id'=>$class_id,
                                            'session_id'=>$session_id,
                                            'total'=>$total,
                                        ]) }}" class="btn btn-info" style="float: right;"><i class="las la-plus"></i>Add Collection</a>

                                         <a href="{{ url($url) }}" class="btn btn-primary" style="float: right; margin-right:4px;"><i class="las la-angle-double-left"></i>Back</a>
                                    </h4>
                                </div>
                            </div>
                           <div class="row mt-3">
                              <div class="col-sm-4">
                                <span>Student Name:</span> <strong>{{ $student->name }}</strong>
                              </div>
                              <div class="col-sm-4">
                                <span>Class:</span> <strong>{{ $student->clas->class_name }}</strong>
                              </div>
                              <div class="col-sm-4">
                                <span>Roll:</span> <strong>{{ $student->roll }}</strong>
                              </div>
                           </div>{{-- row --}}

                           <div class="row mt-3">
                             <div class="col-sm-4">
                                <span>Reg:</span> <strong>{{ $student->registration }}</strong>
                              </div>

                              <div class="col-sm-4">
                                <span>Session:</span> <strong>{{ $student->session->session_year }}</strong>
                              </div>
                           </div>{{-- row --}}

                           <form action="{{ route('admin.add.collection',[
                            'id'=>$student->id,
                            'class_id'=>$student->clas_id,
                           ]) }}" method="GET">
                            <div class="row mt-5">
                                <div class="col-sm-6">
                                  <div class="form-group">
                                      <label>Month:</label>
                                      <select name="month" class="form-control" required>
                                          <option value="" selected disabled>Select</option>
                                          <option value="January">January</option>
                                          <option value="February">February</option>
                                          <option value="March">March</option>
                                          <option value="April">April</option>
                                          <option value="May">May</option>
                                          <option value="June">June</option>
                                          <option value="July">July</option>
                                          <option value="August">August</option>
                                          <option value="September">September</option>
                                          <option value="October">October</option>
                                          <option value="November">November</option>
                                          <option value="December">December</option>
                                      </select>
                                  </div>
                                </div>
                                <div class="col-sm-6">
                                  <div class="form-group">
                                      <input type="submit"  value="Filter" class="btn btn-info btn-block" style="margin-top: 2rem;">
                                  </div>
                                </div>
                             </div>{{-- row --}}
                           </form>

                        </div>


                        @if(count($fees_collection)>0)
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                   <tr class="text-center">
                                    <th>Total Fee</th>
                                    <th>Given Amount</th>
                                    <th>Due Amount</th>
                                    <th>Date</th>
                                    <th>Month</th>
                                   </tr>
                                </thead>

                                <tbody>
                                   @foreach ($fees_collection as $collection)
                                   <tr class="text-center">
                                        <td>{{  $total }} TK.</td>
                                        <td>{{ $collection->given_amount }}</td>
                                        <td>{{ $collection->due_amount }}</td>
                                        <td>{{ date('d-m-Y',strtotime      ($collection->created_at)) }}
                                        </td>
                                        <td>{{ $collection->month }}</td>
                                    </tr>
                                   @endforeach
                                </tbody>
                            </table>
                        </div>
                        @endif
                    </div>
                </div>
            </div>{{-- row --}}
    </div>
 </section>

@endsection
