@extends('admin.admin_master')

@section('title')
    Add Sub Category
@endsection

@section('content')
    <section class="content">
        .<div class="container-fluid">
            <div class="row">
                <div class="col-sm-8 offset-sm-2">
                    <div class="card">
                        <div class="card-header">
                            <h4>Add Sub Category
                                <a href="{{ route('admin.all.subCategory') }}" class="btn btn-primary" style="float: right;"><i
                                        class="las la-angle-double-left"></i>Back</a>
                            </h4>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('admin.store.subCategory') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Sub Category Name<span class="text-danger">*</span></label>
                                    <input type="text" name="title" class="form-control"
                                        placeholder="Enter Examination Name....">
                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Select Category<span class="text-danger">*</span></label>
                                    <select name="category" id="" class="form-control">
                                        <option value="" selected>Select Category</option>
                                        <option value="আমাদের সম্পর্কে">আমাদের সম্পর্কে</option>
                                        <option value="প্রশাসনিক তথ্য">প্রশাসনিক তথ্য</option>
                                        <option value="প্শিক্ষক ও কর্মচারী">শিক্ষক ও কর্মচারী</option>
                                        <option value="একাডেমিক">একাডেমিক</option>
                                        <option value="কো-কারিকুলার">কো-কারিকুলার</option>
                                        <option value="ভর্তি সংক্রান্ত তথ্য">ভর্তি সংক্রান্ত তথ্য</option>
                                        <option value="পরীক্ষা">পরীক্ষা</option>
                                        <option value="ফলাফল">ফলাফল</option>
                                        <option value="গ্যালারী">গ্যালারী</option>
                                    </select>
                                    @error('category')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Image<span class="text-danger">*</span></label>
                                    <input type="file" name="image" class="form-control" placeholder="Principal">
                                    @error('image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Description<span class="text-danger">*</span></label>
                                    <textarea name="description" class="ckeditor" id="description" cols="30" rows="5"></textarea>
                                    @error('description')
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

    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
@endsection
