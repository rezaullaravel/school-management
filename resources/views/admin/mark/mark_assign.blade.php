@extends('admin.admin_master')

@section('title')
    Mark Assign
@endsection

@section('content')
    <section class="content">
        <div class="container-fluid pt-3">
            <div class="row">
                <div class="col-sm-10 offset-sm-1">
                    <div class="card">
                        <div class="card-header">
                            <h4>Mark Assign.</h4>
                        </div>


                        <div class="card-body">
                            <form action="{{ route('admin.mark.assign') }}" method="GET">

                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="">Class</label>
                                            <select name="clas_id" id="class_id" class="form-control" required>
                                                <option value="" selected disabled>Select</option>
                                                @foreach ($classes as $class)
                                                    <option value="{{ $class->id }}">{{ $class->class_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="">Section</label>
                                            <select name="section_id" id="section_id" class="form-control">
                                                <option value="" disabled>Select</option>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-3">

                                        <div class="form-group">
                                            <label for="">Subject</label>
                                            <select name="subject_id" id="subject_id" class="form-control" required>


                                                <option value="">Select Subject</option>

                                            </select>
                                        </div>


                                    </div>

                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="">Exam Name</label>
                                            <select name="exam_id" class="form-control" required>
                                                <option value="" selected disabled>Select</option>
                                                @foreach ($exams as $exam)
                                                    <option value="{{ $exam->id }}"
                                                        {{ Request::get('exam_id') == $exam->id ? 'selected' : '' }}>
                                                        {{ $exam->exam_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>{{-- row --}}

                                <div class="row">

                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="">Session</label>
                                            <select name="session_id" class="form-control" required>
                                                <option value="" selected disabled>Select</option>
                                                @foreach ($sessions as $session)
                                                    <option value="{{ $session->id }}"
                                                        {{ Request::get('session_id') == $session->id ? 'selected' : '' }}>
                                                        {{ $session->session_year }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for=""></label>
                                            <input type="submit" value="submit" class="btn btn-success btn-block"
                                                style="margin-top:7px;">
                                        </div>
                                    </div>
                                </div>{{-- row --}}
                            </form>
                        </div>
                    </div>
                </div>
            </div>{{-- row --}}



            @if (!empty($class_id && $subject_id))
                <div class="row">
                    <div class="col-sm-10 offset-sm-1">
                        <div class="row">
                            <div class="col-sm-4">
                                @php
                                    $class = App\Models\Clas::where('id', Request::get('clas_id'))->first();
                                @endphp
                                Class: <strong>{{ $class->class_name }}</strong>
                            </div>
                            <div class="col-sm-4">
                                @php
                                    $section = App\Models\Section::where('id', Request::get('section_id'))->first();
                                @endphp
                                Section: <strong>{{ $section?->section_name }}</strong>
                            </div>
                            <div class="col-sm-4">
                                @php
                                    $session = App\Models\SessionModel::where(
                                        'id',
                                        Request::get('session_id'),
                                    )->first();
                                @endphp
                                Session: <strong>{{ $session->session_year }}</strong>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-sm-10 offset-sm-1">
                        <div class="row">
                            <div class="col-sm-4">
                                @php
                                    $exam = App\Models\Exam::where('id', Request::get('exam_id'))->first();
                                @endphp
                                Exam: <strong>{{ $exam->exam_name }}</strong>
                            </div>
                            <div class="col-sm-4">
                                @php
                                    $subject = App\Models\Subject::where('id', Request::get('subject_id'))->first();
                                @endphp
                                Subject: <strong>{{ $subject->subject }}</strong>
                                @if ($subject->type == 'optional')
                                    <span>({{ $subject->type }})</span>
                                @endif
                            </div>
                            <div class="col-sm-4">

                            </div>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-sm-10 offset-sm-1">
                        <div class="card">
                            <div class="card-header">

                            </div>
                            <div class="card-body">
                                <form action="{{ route('admin.mark.insert') }}" method="POST">
                                    @csrf
                                    <table class="table table-bordered">
                                        <thead>
                                            <th>Sl</th>
                                            <th>Student Name</th>
                                            <th>Roll</th>
                                            <th>Reg.</th>
                                            <th>Mark</th>
                                        </thead>
                                        <tbody>
                                            <input type="hidden" name="clas_id" value="{{ $class_id }}">
                                            <input type="hidden" name="section_id" value="{{ $section_id }}">
                                            <input type="hidden" name="subject_id" value="{{ $subject_id }}">
                                            <input type="hidden" name="exam_id" value="{{ Request::get('exam_id') }}">
                                            <input type="hidden" name="session_id"
                                                value="{{ Request::get('session_id') }}">
                                            @foreach ($students as $index => $student)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>{{ $student->name }}</td>
                                                    <td>{{ $student->roll }}</td>
                                                    <td>{{ $student->registration }}</td>
                                                    @php
                                                        $mark = App\Models\Mark::where('subject_id', $subject_id)
                                                            ->where('clas_id', $class_id)
                                                            ->where('section_id', $section_id)
                                                            ->where('session_id', Request::get('session_id'))
                                                            ->where('subject_id', $subject_id)
                                                            ->where('student_id', $student->id)
                                                            ->where('exam_id', Request::get('exam_id'))
                                                            ->first();

                                                        // Fetch the subject to check if it's mandatory or optional
                                                        $subject = App\Models\Subject::find($subject_id);
                                                    @endphp
                                                    <td>
                                                        <input type="text" name="mark[]" class="form-control"
                                                            placeholder="Enter mark"
                                                            value="{{ !empty($mark) ? $mark->mark : '' }}"   @if($subject->type == 'mandatory') required @endif>

                                                        <input type="hidden" name="student_id[]"
                                                            value="{{ $student->id }}">
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>

                                    </table>


                                    <div class="row">
                                        <div class="col-sm-12">
                                            <input type="submit" value="Assign Mark" class="btn btn-success"
                                                style="float: right;">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>{{-- row --}}
            @endif



        </div>
    </section>



    {{-- js for section and subject auto select --}}
    <script type="text/javascript">
        $(document).ready(function() {

            // Fetch sections when class is selected
            $('#class_id').on('change', function() {
                var class_id = $(this).val();
                if (class_id) {
                    $.ajax({
                        url: "{{ url('/admin/class/section/ajax') }}/" + class_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            //console.log("Sections data received:", data);
                            $('#section_id').empty();
                            $('#section_id').append('<option value="">Select Section</option>');
                            $.each(data, function(key, value) {
                                $('#section_id').append('<option value="' + value.id +
                                    '">' + value.section_name + '</option>');
                            });

                            // Trigger the change event to fetch subjects for the first section automatically
                            var firstSectionId = data.length > 0 ? data[0].id : null;
                            $('#section_id').val(firstSectionId).trigger('change');
                        },
                        error: function(xhr, status, error) {
                            console.error("Error fetching sections:", error);
                        }
                    });
                } else {
                    alert('Please select a class.');
                }
            });

            // Fetch subjects when section is selected
            $('#section_id').on('change', function() {
                var class_id = $('#class_id').val();
                var section_id = $('#section_id').val();
                fetchSubjects(class_id, section_id);
            });

            // Function to fetch subjects based on class and section
            function fetchSubjects(class_id, section_id = null) {
                if (class_id) {
                    var url = section_id ? "{{ url('/admin/getSubjects') }}/" + class_id + "/" + section_id :
                        "{{ url('/admin/getSubjects') }}/" + class_id;
                    $.ajax({
                        url: url,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            console.log("Subjects data received:", data);
                            $('#subject_id').empty();
                            $('#subject_id').append('<option value="">Select Subject</option>');
                            $.each(data, function(key, value) {
                                let typeText = value.type === 'optional' ? ' (' + value.type +
                                    ')' : '';

                                //  $('#subject_id').append('<option value="' + value.id + '">' + value.subject + '</option>');
                                $('#subject_id').append('<option value="' + value.id + '">' +
                                    value.subject + typeText + '</option>');
                            });

                            // Automatically select the first subject if available
                            if (data.length > 0) {
                                $('#subject_id').val(data[0].id);
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error("Error fetching subjects:", error);
                        }
                    });
                } else {
                    alert('Please select a class.');
                }
            }

            // Initial load: Trigger change event for class selection if class_id is pre-selected
            var initial_class_id = $('#class_id').val();
            if (initial_class_id) {
                $('#class_id').trigger('change');
            }
        });
    </script>













@endsection
