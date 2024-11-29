@extends('admin.admin_master')

@section('title')
    Edit Sub Category
@endsection

@section('content')
    <section class="content">
        .<div class="container-fluid">
            <div class="row">
                <div class="col-sm-8 offset-sm-2">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Sub Category
                                <a href="{{ route('admin.all.subCategory') }}" class="btn btn-primary" style="float: right;"><i
                                        class="las la-angle-double-left"></i>Back</a>
                            </h4>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('admin.update.subCategory') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $data->id }}">
                                <div class="form-group">
                                    <label>Sub Category Name<span class="text-danger">*</span></label>
                                    <input type="text" name="title" value="{{ $data->title }}" class="form-control"
                                        placeholder="Enter Title....">
                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Select Category<span class="text-danger">*</span></label>
                                    <select name="category" id="" class="form-control">
                                        <option value="" selected>Select Category</option>
                                        <option value="আমাদের সম্পর্কে"
                                            {{ 'আমাদের সম্পর্কে' === $data->category ? 'selected' : '' }}>আমাদের
                                            সম্পর্কে</option>
                                        <option value="প্রশাসনিক তথ্য"
                                            {{ 'প্রশাসনিক তথ্য' == $data->category ? 'selected' : '' }}>প্রশাসনিক তথ্য
                                        </option>
                                        <option value="প্শিক্ষক ও কর্মচারী"
                                            {{ 'প্শিক্ষক ও কর্মচারী' == $data->category ? 'selected' : '' }}>প্শিক্ষক ও
                                            কর্মচারী
                                        </option>
                                        <option value="একাডেমিক" {{ 'একাডেমিক' == $data->category ? 'selected' : '' }}>
                                            একাডেমিক</option>
                                        <option value="কো-কারিকুলার"
                                            {{ 'কো-কারিকুলার' == $data->category ? 'selected' : '' }}>কো-কারিকুলার
                                        </option>
                                        <option value="ভর্তি সংক্রান্ত তথ্য"
                                            {{ 'ভর্তি সংক্রান্ত তথ্য' == $data->category ? 'selected' : '' }}>ভর্তি
                                            সংক্রান্ত তথ্য
                                        </option>
                                        <option value="পরীক্ষা" {{ 'পরীক্ষা' == $data->category ? 'selected' : '' }}>
                                            পরীক্ষা</option>
                                        <option value="ফলাফল" {{ 'ফলাফল' == $data->category ? 'selected' : '' }}>
                                            ফলাফল</option>
                                        <option value="গ্যালারী" {{ 'গ্যালারী' == $data->category ? 'selected' : '' }}>
                                            গ্যালারী</option>
                                    </select>
                                    @error('category')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Image<span class="text-danger">*</span></label>
                                    <input type="file" value="{{ $data->image }}" name="image" class="form-control"
                                        placeholder="Principal">
                                    @error('image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Description<span class="text-danger">*</span></label>
                                    <textarea name="description" class="ckeditor" id="description" cols="30" rows="5">{{ $data->description }}</textarea>
                                    @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <input type="submit" class="btn btn-success" value="Update" style="float: right;">
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
