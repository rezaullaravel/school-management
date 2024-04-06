@extends('admin.admin_master')

@section('title')
    Add Collection.
@endsection

@section('content')
 <section class="content">
    .<div class="container-fluid">
        <div class="row">
            <div class="col-sm-10 offset-sm-1">
                @if (session('sms'))
                <div class="alert alert-danger">
                    <p class="text-center">{{ Session::get('sms') }}</p>
                </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h4>Add Collection.
                            <a href="{{ url($url) }}" class="btn btn-primary" style="float: right;"><i class="las la-angle-double-left"></i>Back</a>
                        </h4>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('admin.collection.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="student_id" value="{{ $student_id }}">
                            <input type="hidden" name="clas_id" value="{{ $class_id }}">
                            <input type="hidden" name="session_id" value="{{ $session_id }}">
                            <input type="hidden" name="total_fee" value="{{ $total }}">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Student Name:</label>
                                        <input type="text"  value="{{ $student->name }}" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Class:</label>
                                        <input type="text"  value="{{ $student->clas->class_name }}" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Session:</label>
                                        <input type="text"  value="{{ $student->session->session_year }}" class="form-control" readonly>
                                    </div>
                                </div>
                            </div>{{-- row --}}

                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Total Fee:</label>
                                        <input type="text"  value="{{ $total }} TK." class="form-control" readonly>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Given Amount:</label>
                                        <input type="number" name="given_amount"  value="" class="form-control" required>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Fee Month:</label>
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

                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <input type="submit"  value="Submit" class="btn btn-info btn-block" style="margin-top: 2rem;">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
 </section>
@endsection
