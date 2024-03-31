@extends('admin.admin_master')

@section('title')
    Edit Logo
@endsection

@section('content')
 <section class="content">
    .<div class="container-fluid">
        <div class="row">
            <div class="col-sm-8 offset-sm-2">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Logo.

                        </h4>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('admin.logo.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label>Logo<span class="text-danger">*</span></label>
                                <input type="file" name="logo"  class="form-control" required>
                                <p class="text-danger">If you want to change your logo, please upload new logo....</p>
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
