@extends('admin.admin_master')

@section('title')
    Add Principal
@endsection

@section('content')
    <section class="content">
        .<div class="container-fluid">
            <div class="row">
                <div class="col-sm-8 offset-sm-2">
                    <div class="card">
                        <div class="card-header">
                            <h4>Create Principal.
                                <a href="{{ route('admin.frontend.setting.principal') }}" class="btn btn-primary"
                                    style="float: right;"><i class="las la-angle-double-left"></i>Back</a>
                            </h4>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('admin.store.principal') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <label>Name<span class="text-danger">*</span></label>
                                    <input type="text" name="name" id="name" class="form-control"
                                        placeholder="Name">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Image<span class="text-danger">*</span></label>
                                    <input type="file" name="image" id="image" class="form-control"
                                        placeholder="2015-16">
                                    @error('image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Descripotion<span class="text-danger">*</span></label>
                                    <textarea name="description" id="pEditor"  cols="40" rows="20"></textarea>
                                    @error('descripotion')
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
                .create( document.querySelector( '#pEditor' ),{
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
