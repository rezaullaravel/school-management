@extends('admin.admin_master')

@section('title')
    Add Notice
@endsection

@section('content')
    <section class="content">
        .<div class="container-fluid">
            <div class="row">
                <div class="col-sm-8 offset-sm-2">
                    <div class="card">
                        <div class="card-header">
                            <h4>Add Notice.
                                <a href="{{ route('admin.all.notice') }}" class="btn btn-primary" style="float: right;"><i
                                        class="las la-angle-double-left"></i>Back</a>
                            </h4>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('admin.store.notice') }}" method="POST">
                                @csrf

                                <div class="form-group">
                                    <label>Notice Title<span class="text-danger">*</span></label>
                                    <input type="text" name="title" class="form-control" placeholder="Title">
                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Notice Description<span class="text-danger">*</span></label>
                                    <textarea name="description"  id="editor" cols="30" rows="10"></textarea>
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
