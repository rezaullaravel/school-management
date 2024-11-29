@extends('admin.admin_master')

@section('title')
    All Payment
@endsection

@section('content')
 <section class="content">
    .<div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>All Payment.

                        </h4>
                    </div>


                        <div class="card-body">
                            <table id="example" class="table table-striped table-bordered  table-responsive">
                                <thead>
                                    <tr class="text-center">
                                        <th>Sl</th>
                                        <th>Transaction Id</th>
                                        <th>Sender Name</th>
                                        <th>Sender Type</th>
                                        <th>Sender Phone</th>
                                        <th>Sender Email</th>
                                        <th>Student Name</th>
                                        <th>Student Reg</th>
                                        <th>Student Class</th>
                                        <th>Student Session</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach ($payments as $index=>$row)
                                    @php
                                        $student = App\Models\Student::where('registration',$row->student_reg)->first();
                                    @endphp
                                     <tr class="text-center">
                                        <td>{{ $index+1 }}</td>
                                        <td>{{ $row->transaction_id }}</td>
                                        <td>{{ $row->sender_name }}</td>
                                        <td>{{ $row->sender_type }}</td>
                                        <td>{{ $row->sender_phone }}</td>
                                        <td>{{ $row->sender_email }}</td>
                                        <td>{{ $student->name }}</td>
                                        <td>{{ $student->registration }}</td>
                                        <td>{{ $student->clas->class_name }}</td>
                                        <td>{{ $student->session->session_year }}</td>
                                        <td>{{ date('m-d-Y',strtotime($row->created_at)) }}</td>
                                        <td>
                                            @if ($row->status==0)
                                                <span class="text-danger">Pending</span>
                                            @endif

                                            @if($row->status==1)
                                               <span class="text-primary">Completed</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($row->status==0)
                                              <a href="{{ route('admin.payment.status.complete',$row->id) }}" class="btn btn-danger btn-sm" title="Make it complete"><i class="las la-arrow-down"></i></a>
                                            @else
                                               <a href="{{ route('admin.payment.status.pending',$row->id) }}" class="btn btn-info btn-sm" title="Make it pending"><i class="las la-arrow-up"></i></a>
                                            @endif

                                            <a href="{{ route('admin.delete.payment',$row->id) }}" class="btn btn-danger btn-sm" onclick="confirmation(event)" title="Delete" style="margin:3px;"><i class="las la-trash"></i></a>
                                        </td>
                                     </tr>
                                  @endforeach

                                </tbody>
                            </table>
                        </div>
                </div>
            </div>
        </div>
    </div>
 </section>
@endsection
