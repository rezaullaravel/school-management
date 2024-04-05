@extends('admin.admin_master')

@section('title')
    Add Fee Category
@endsection

@section('content')
 <section class="content">
    .<div class="container-fluid">
        <div class="row">
            <div class="col-sm-10 offset-sm-1">
                <div class="card">
                    <div class="card-header">
                        <h4>Add Fee Category
                            <a href="{{ url('admin/fees/category') }}" class="btn btn-primary" style="float: right;"><i class="las la-angle-double-left"></i>Back</a>
                        </h4>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('admin.store.fee.category') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Fee Category Name<span class="text-danger">*</span></label>
                                <input type="text" name="fees_category_name" class="form-control" placeholder="Enter Fee Category Name....">
                                @error('fees_category_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input type="submit" class="btn btn-success" value="Submit" style="float: right;">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
 </section>
@endsection
