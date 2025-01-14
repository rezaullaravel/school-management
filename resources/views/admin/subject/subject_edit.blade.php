@extends('admin.admin_master')

@section('title')
    Edit Subject
@endsection

@section('content')
 <section class="content">
    .<div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Subject
                            <a href="{{ route('admin.all.subject') }}" class="btn btn-primary" style="float: right;"><i class="las la-angle-double-left"></i>Back</a>
                        </h4>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('admin.update.subject') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label>Class <span class="text-danger">*</span></label>
                                <select type="text" name="clas_id" class="form-control" required>
                                    <option value="" selected disabled>Select</option>
                                    @foreach ($classes as $class)
                                        <option value="{{ $class->id }}" {{ $class->id == $subject->clas_id ? 'selected':'' }}>{{ $class->class_name }}</option>
                                    @endforeach
                                </select>

                            </div>

                            <div class="form-group">
                                <label>Section <span class="text-danger">*</span></label>
                                <select type="text" name="section_id" class="form-control">
                                    <option value="" selected disabled>Select</option>
                                    @foreach ($sections  as $section)
                                       <option value="{{ $section->id }}" {{$section->id == $subject->section_id ? 'selected':'' }}>{{ $section->section_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Subject Name<span class="text-danger">*</span></label>
                                <input type="text" name="subject" value="{{ $subject->subject }}" class="form-control">
                                <input type="hidden" name="id" value="{{ $subject->id }}" class="form-control">
                                @error('subject')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Type <span class="text-danger">*</span></label>
                                <select name="type" class="form-control" required>
                                    <option value="mandatory" {{ $subject->type=='mandatory' ? 'selected':'' }}>Mandatory</option>
                                    <option value="optional" {{ $subject->type=='optional' ? 'selected':'' }}>Optional</option>
                                </select>
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
@endsection
