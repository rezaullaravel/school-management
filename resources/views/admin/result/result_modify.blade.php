@extends('admin.admin_master')

@section('title')
    Result Modify
@endsection

@section('content')
 <section class="content">
    .<div class="container-fluid">
        <div class="row">
            <div class="col-sm-8 offset-sm-2">
                @if (session('sms'))
                    <div class="alert alert-danger">
                        <h4 class="text-center">{{ Session::get('sms') }}</h4>
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h4>Result Modify.

                        </h4>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('admin.modify-result') }}" method="GET">


                            <div class="form-group">
                                <label>Student Registration<span class="text-danger">*</span></label>
                                <input type="text" name="registration"  class="form-control" placeholder="Enter Student Registration..." required>
                            </div>


                            <div class="form-group">
                                <label>Examination Name<span class="text-danger">*</span></label>
                                <select name="exam_id"  class="form-control" required>
                                    <option value="" selected disabled>Select</option>
                                    @foreach ($exams as $exam)
                                        <option value="{{ $exam->id }}"> {{ $exam->exam_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <input type="submit"  class="btn btn-success" value="Submit" style="float: right;">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
 </section>

@endsection
