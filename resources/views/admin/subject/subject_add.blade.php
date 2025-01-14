@extends('admin.admin_master')

@section('title')
    Add Subject
@endsection

@section('content')
    <section class="content">
        <div class="container-fluid pt-3">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Add Subject
                                <a href="{{ route('admin.all.subject') }}" class="btn btn-primary" style="float: right;"><i
                                        class="las la-angle-double-left"></i>Back</a>
                            </h4>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('admin.store.subject') }}" method="POST">
                                @csrf

                                <div class="form-group">
                                    <label>Class <span class="text-danger">*</span></label>
                                    <select type="text" name="clas_id" class="form-control" required>
                                        <option value="" selected disabled>Select</option>
                                        @foreach ($classes as $class)
                                            <option value="{{ $class->id }}">{{ $class->class_name }}</option>
                                        @endforeach
                                    </select>
                                    {{-- @error('clas_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror --}}
                                </div>

                                <div class="form-group">
                                    <label>Section <span class="text-danger">*</span></label>
                                    <select type="text" name="section_id" class="form-control">
                                        <option value="" selected disabled>Select</option>

                                    </select>
                                    {{-- @error('section_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror --}}
                                </div>




                                <div class="dynamic_field">
                                    <div class="row">
                                        <div class="col-sm-6">

                                            <div class="form-group">
                                                <label>Subject Name<span class="text-danger">*</span></label>
                                                <input type="text" name="subject[]" class="form-control"
                                                    placeholder="Enter Subject Name...." required>
                                                {{-- @error('subject')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror --}}
                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Type <span class="text-danger">*</span></label>
                                                <select name="type[]" class="form-control" required>
                                                    <option value="mandatory">Mandatory</option>
                                                    <option value="optional">Optional</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-2">
                                            <button class="btn btn-success" id="add_rows" style="margin-top:30px">
                                                <i class="lar la-plus-square"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>



                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="Submit" style="float: right;">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- javascript for section auto select --}}
    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="clas_id"]').on('change', function() {
                var class_id = $(this).val();
                if (class_id) {
                    $.ajax({
                        url: "{{ url('/admin/class/section/ajax') }}/" + class_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            var d = $('select[name="section_id"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="section_id"]').append(
                                    '<option value="' + value.id + '">' +
                                    value.section_name + '</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            });
        });
    </script>
    {{-- javascript for section auto select end --}}

    <script>
        const html = ` <div class="row">
                        <div class="col-sm-6">

                            <div class="form-group">
                                <label>Subject Name<span class="text-danger">*</span></label>
                                <input type="text" name="subject[]" class="form-control" placeholder="Enter Subject Name...." required>
                                @error('subject')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                         <div class="col-sm-4">
                            <div class="form-group">
                                <label>Type <span class="text-danger">*</span></label>
                                <select name="type[]" class="form-control" required>
                                    <option value="mandatory">Mandatory</option>
                                    <option value="optional">Optional</option>
                                </select>
                            </div>
                         </div>

                        <div class="col-sm-2">
                            <button class="btn btn-danger remove" style="margin-top:30px">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </div>`;

        //add rows
        $('#add_rows').on('click', function(e) {
            e.preventDefault();
            $('.dynamic_field').append(html);
        });


        // Remove rows using event delegation
        $('.dynamic_field').on('click', '.remove', function(e) {
            e.preventDefault();
            $(this).closest('.row').remove();
        });
    </script>
@endsection
