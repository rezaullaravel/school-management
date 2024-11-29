@extends('admin.admin_master')

@section('title')
    Edit Teacher
@endsection

@section('content')
 <section class="content">
    .<div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Teacher.
                            <a href="{{ route('admin.all.teacher') }}" class="btn btn-primary" style="float: right;"><i class="las la-angle-double-left"></i>Back</a>
                        </h4>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('admin.update.teacher',$teacher->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Teacher Name <span class="text-danger">*</span></label>
                                    <input type="text" name="name" value="{{ $teacher->name }}" class="form-control">
                                    @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Email <span class="text-danger">*</span></label>
                                        <input type="email" name="email" value="{{ $teacher->email }}" class="form-control">
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>{{-- row --}}


                            <div class="row">
                                <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Password <span class="text-danger">*</span></label>
                                    <input type="text" name="password"  class="form-control">
                                    <p class="text-danger">If you want to change password, please enter new password....</p>
                                </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Phone <span class="text-danger">*</span></label>
                                        <input type="phone" name="phone" value="{{ $teacher->phone }}" class="form-control">
                                        @error('phone')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>{{-- row --}}


                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Desigantion<span class="text-danger">*</span> </label>
                                        <select name="designation_id" class="form-control">
                                            <option value="" selected disabled>Select Designation</option>
                                            @foreach ($designations as $designation)
                                                <option value="{{ $designation->id }}" {{ $designation->id==$teacher->designation_id ? 'selected':'' }}>{{ $designation->designation }}</option>
                                            @endforeach
                                        </select>
                                        @error('designation_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Salary <span class="text-danger">*</span></label>
                                        <input type="text" name="salary" class="form-control" value="{{ $teacher->salary }}">

                                        @error('salary')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>{{-- row --}}

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <input type="file" name="image" class="form-control">

                                        @error('image')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>{{-- row --}}



                            <div class="row">
                                <div class="col-sm-12">
                                    <input type="submit" value="Update" class="btn btn-success btn-block">
                                </div>
                            </div>{{-- row --}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
 </section>

@endsection
