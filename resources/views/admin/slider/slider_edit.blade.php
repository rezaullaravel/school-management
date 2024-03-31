@extends('admin.admin_master')

@section('title')
    Edit Slider
@endsection

@section('content')
 <section class="content">
    .<div class="container-fluid">
        <div class="row">
            <div class="col-sm-10 offset-sm-1">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Slider.
                            <a href="{{ route('admin.slider.all') }}" class="btn btn-primary" style="float: right;"><i class="las la-angle-double-left"></i>Back</a>
                        </h4>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('admin.update.slider') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="id" value="{{ $slider->id }}">

                            <div class="form-group">
                                <label>Slider Image<span class="text-danger">*</span></label>
                                <input type="file" name="image"  class="form-control">
                               <p class="text-danger">If you want to change slider image, please upload new image.....</p>
                               @error('image')
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
