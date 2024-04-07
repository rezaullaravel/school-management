@extends('admin.admin_master')

@section('title')
    Payment
@endsection

@section('content')
 <section class="content">
    .<div class="container-fluid">
        <div class="row">
            <div class="col-sm-10 offset-sm-1">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h4>Payment.

                        </h4>

                        <form action="{{ route('guardian.payment') }}" method="GET">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="number" name="registration" value="{{ Request::get('registration') }}" class="form-control" placeholder="Enter student registration number" required>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <input type="submit" value="Submit" class="form-control btn btn-info">
                                    </div>
                                </div>
                             </div>
                        </form>
                    </div>{{-- card header --}}

                    @if(!empty($student))
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Student Name</th>
                                    <th>Reg.</th>
                                    <th>Class</th>
                                    <th>Session</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $student->name }}</td>
                                    <td>{{ $student->registration }}</td>
                                    <td>{{ $student->clas->class_name }}</td>
                                    <td>{{ $student->session->session_year }}</td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="row mt-5">
                           <div class="col-sm-12">
                              <p>Send money to <strong>01719475187</strong> (bkash) number and fillup the following form. <span class="text-danger">If you don't fillup the form, your payment will not be completed.</span> </p>
                           </div>
                        </div>{{-- row --}}
                        <form action="{{ route('guardian.payment.store') }}" method="POST">
                            @csrf
                        <div class="row mt-5">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <input type="text" name="transaction_id" class="form-control" placeholder="Enter bkash transaction id">
                                        @error('transaction_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <input type="hidden" name="registration" value="{{ $student->registration }}" class="form-control" placeholder="Enter bkash transaction number">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <input type="submit" value="Submit" class="form-control btn btn-info">
                                    </div>
                                </div>
                        </div>
                       </form>
                    </div>
                    @endif


                </div>
            </div>
        </div>
    </div>
 </section>

@endsection
