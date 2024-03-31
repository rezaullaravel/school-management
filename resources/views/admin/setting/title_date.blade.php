@extends('admin.admin_master')

@section('title')
    Edit Title & Date
@endsection

@section('content')
 <section class="content">
    .<div class="container-fluid">
        <div class="row">
            <div class="col-sm-8 offset-sm-2">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Title & Date.

                        </h4>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('admin.title.update') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label>Title<span class="text-danger">*</span></label>
                                <input type="text" name="title" value="{{ $setting->title }}" class="form-control" required>

                            </div>

                            <div class="form-group">
                                <label>Date<span class="text-danger">*</span></label>
                                <input type="text" name="date" value="{{ $setting->date }}" class="form-control" required>

                            </div>

                            <div class="form-group">
                                <input type="submit"  class="btn btn-success" value="Update" style="float: right;">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
 </section>

@endsection
