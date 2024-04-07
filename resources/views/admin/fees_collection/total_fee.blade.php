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
                            <div class="row">
                                <div class="col-sm-12">
                                    <h4>
                                        <a href="{{ url($url) }}" class="btn btn-info" style="float: right;"><i class="las la-angle-double-left"></i>Back</a>
                                    </h4>
                                </div>
                            </div>
                           <div class="row mt-3">
                             <div class="col-sm-4">
                                <span>Student Name:</span>
                                <strong>{{ $student->name }}</strong>
                             </div>
                             <div class="col-sm-4">
                                <span>Class:</span>
                                <strong>{{ $student->clas->class_name }}</strong>
                             </div>
                             <div class="col-sm-4">
                                <span>Roll:</span>
                                <strong>{{ $student->roll }}</strong>
                             </div>
                           </div>{{-- row --}}

                           <div class="row mt-3">
                            <div class="col-sm-4">
                               <span>Reg:</span>
                               <strong>{{ $student->registration }}</strong>
                            </div>
                            <div class="col-sm-4">
                               <span>Session:</span>
                               <strong>{{ $student->session->session_year }}</strong>
                            </div>
                          </div>{{-- row --}}

                        </div>
                        <div class="card-body">
                                @if (count($total_fees)>0)
                                <table class="table table-bordered">
                                    <thead>
                                       <tr class="text-center">
                                        <th>Sl</th>
                                        <th>Fee Category</th>
                                        <th>Fee</th>
                                       </tr>
                                    </thead>

                                    <tbody>
                                        @php
                                            $sum = 0;
                                        @endphp
                                       @foreach ($total_fees as $key => $row)
                                          <tr class="text-center">
                                             <td>{{ $key+1 }}</td>
                                             <td>{{ $row->fees_category->fees_category_name }}
                                            </td>
                                             <td>{{ number_format($row->fees_amount,2 ) }} TK.</td>
                                             @php
                                                 $sum = $sum + $row->fees_amount;
                                             @endphp
                                          </tr>
                                       @endforeach

                                       <tr class="text-center">
                                         <td colspan="2">Total Fee</td>
                                         <th>{{ number_format($sum,2) }} TK.</th>
                                       </tr>
                                    </tbody>
                                </table>
                                @else
                                  <h4 class="text-danger text-center">No data found....</h4>
                                @endif
                        </div>
                    </div>
                </div>
            </div>{{-- row --}}
    </div>
 </section>

@endsection
