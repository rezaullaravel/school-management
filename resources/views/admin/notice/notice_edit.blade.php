@extends('admin.admin_master')

@section('title')
    Edit Notice
@endsection

@section('content')
    <section class="content">
        .<div class="container-fluid">
            <div class="row">
                <div class="col-sm-10 offset-sm-1">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Notice.
                                <a href="{{ route('admin.all.notice') }}" class="btn btn-primary" style="float: right;"><i
                                        class="las la-angle-double-left"></i>Back</a>
                            </h4>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('admin.update.notice') }}" method="POST">
                                @csrf

                                <input type="hidden" name="id" value="{{ $notice->id }}">

                                <div class="form-group">
                                    <label>Notice Title<span class="text-danger">*</span></label>
                                    <input name="title" class="form-control" value="{{ $notice->title }}" />
                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                </div>
                                <div class="form-group">
                                    <label>Notice Description<span class="text-danger">*</span></label>
                                    <textarea rows="20" cols="5" name="description" class="form-control" id="editor">
                                        {{ $notice->description }}
                                    </textarea>
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

    <script src="{{ asset('ckeditor5/ckeditor.js') }}"></script>
    <script>
        ClassicEditor
        .create( document.querySelector( '#editor' ),{
            ckfinder:{
                uploadUrl:'{{ route('ckeditor.upload').'?_token='.csrf_token() }}'
            }
        } )
        .then( editor => {
                console.log( editor );
        } )
        .catch( error => {
                console.error( error );
        } );
    </script>
@endsection
