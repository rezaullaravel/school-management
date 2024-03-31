@extends('admin.admin_master')

@section('title')
    Password Change
@endsection

@section('content')
 <section class="content">
    .<div class="container-fluid">
        <div class="row">
            <div class="col-sm-8 offset-sm-2">
                <div class="card">
                    <div class="card-header">
                        <h4>Change Password.

                        </h4>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('teacher.update.password') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label>New Password<span class="text-danger">*</span></label>
                                <input type="text" name="password"  class="form-control" required>
                                <p class="text-danger">If you want to change your password, please enter new password...</p>
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

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
