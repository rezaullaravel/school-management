@extends('admin.admin_master')

@section('title')
    Class Wise Result View
@endsection

@section('content')
    <section class="content">
        <div class="container-fluid pt-3">
            <div class="row">
                <div class="col-sm-12 p-4">
                    <a href="{{ url('admin/result/by-class') }}" id="back" class="btn btn-primary btn-sm" style="float: right;">Back</a>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    {{-- card start --}}
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-center">Class Wise Result Sheet

                            </h4>
                            <div class="row">
                                <div class="col-sm-12">
                                    <h4 class="text-center">Sherkole Samjan Ali High School</h4>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <p>Class: <strong>{{ $class->class_name }}</strong></p>
                                </div>
                                <div class="col-sm-4">
                                    <p>Session: <strong>{{ $session->session_year }}</strong></p>
                                </div>

                                <div class="col-sm-4">
                                    <p class="text-right">Exam: <strong>{{ $exam->exam_name }}</strong></p>
                                </div>
                            </div>
                        </div>


                        <div class="card-body">
                            <table id="example" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Student Name</th>
                                        <th>Registration</th>
                                        <th>Total Mark</th>
                                        <th>GPA</th>
                                        <th>Grade</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($classWiseStudents as $key => $row)
                                        @php
                                            // Fetch marks for the current student
                                            $marks = App\Models\Mark::where('student_id', $row->id)
                                                ->where('clas_id', $row->clas_id)
                                                ->where('session_id', $row->session_id)
                                                ->where('exam_id', $exam->id)
                                                ->get();

                                            $totalGradePoint = 0;
                                            $totalMarks = 0;
                                            $totalSubjects = count($marks);
                                            $x = '';
                                        @endphp
                                        @if (count($marks) > 0)
                                            @foreach ($marks as $key => $mark)
                                                @php
                                                    if ($mark->mark <= 100 && $mark->mark >= 80) {
                                                        $originalGradePoint = 5.0;
                                                        $grade_name = 'A+';
                                                    } elseif ($mark->mark <= 79 && $mark->mark >= 70) {
                                                        $originalGradePoint = 4.0;
                                                        $grade_name = 'A';
                                                    } elseif ($mark->mark <= 69 && $mark->mark >= 60) {
                                                        $originalGradePoint = 3.5;
                                                        $grade_name = 'A-';
                                                    } elseif ($mark->mark <= 59 && $mark->mark >= 50) {
                                                        $originalGradePoint = 3.0;
                                                        $grade_name = 'B';
                                                    } elseif ($mark->mark <= 49 && $mark->mark >= 40) {
                                                        $originalGradePoint = 2.5;
                                                        $grade_name = 'C';
                                                    } elseif ($mark->mark <= 39 && $mark->mark >= 33) {
                                                        $originalGradePoint = 2.0;
                                                        $grade_name = 'D';
                                                    } elseif ($mark->mark < 33) {
                                                        $originalGradePoint = 0;
                                                        $grade_name = 'F';
                                                    }

                                                    // Determine counted grade point
                                                    $countedGradePoint = $originalGradePoint;

                                                    // Adjust gradePoint for optional subjects
                                                    if ($mark->subject->type == 'optional' && $originalGradePoint > 2) {
                                                        $countedGradePoint = $originalGradePoint - 2;
                                                    } elseif (
                                                        $mark->subject->type == 'optional' &&
                                                        $originalGradePoint <= 2
                                                    ) {
                                                        $countedGradePoint = 0;
                                                    }

                                                    // Calculate counted mark (for optional subjects, subtract 40 if mark > 40)
                                                    $countedMark = $mark->mark;
                                                    if ($mark->subject->type == 'optional' && $mark->mark > 40) {
                                                        $countedMark = $mark->mark - 40;
                                                    } elseif ($mark->subject->type == 'optional' && $mark->mark <= 40) {
                                                        $countedMark = 0;
                                                    }

                                                    // Check if the grade point is 0 for any mandatory subject
                                                    if (
                                                        $originalGradePoint == 0 &&
                                                        $mark->subject->type == 'mandatory'
                                                    ) {
                                                        $x = 'fail';
                                                        //break; // No need to continue, as the result is already 0
                                                    } else {
                                                        $totalGradePoint += $countedGradePoint;
                                                        $totalMarks += $countedMark;
                                                    }

                                                @endphp
                                            @endforeach

                                            @php
                                                // Calculate the total result
                                                // Check if any subject is optional
                                                $isOptionalExists = $marks->contains(function ($mark) {
                                                    return $mark->subject->type == 'optional';
                                                });

                                                // Calculate the total result
                                                if ($x == 'fail') {
                                                    $result = 0;
                                                } else {
                                                    // Calculate the result based on the presence of optional subjects
                                                    if ($isOptionalExists) {
                                                        $result = $totalGradePoint / ($totalSubjects - 1); // Exclude optional subject
                                                    } else {
                                                        $result = $totalGradePoint / $totalSubjects; // Include all subjects
                                                    }
                                                    // Cap the result at 5.00
                                                    if ($result > 5.0) {
                                                        $result = 5.0;
                                                    }
                                                }
                                            @endphp
                                        @endif

                                        <?php
                                        //calculate the total grade name
                                        if (count($marks) > 0) {
                                            if ($result == 5.0) {
                                                $grade_name = 'A+';
                                            } elseif ($result < 5.0 && $result >= 4.0) {
                                                $grade_name = 'A';
                                            } elseif ($result >= 3.5 && $result < 4.0) {
                                                $grade_name = 'A-';
                                            } elseif ($result >= 3.0 && $result < 3.5) {
                                                $grade_name = 'B';
                                            } elseif ($result < 3.0 && $result > 2.5) {
                                                $grade_name = 'C';
                                            } elseif ($result <= 2.5 && $result >= 2.0) {
                                                $grade_name = 'D';
                                            } else {
                                                $grade_name = 'F';
                                            }
                                        }
                                        ?>

                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $row->name }}</td>
                                            <td>{{ $row->registration }}</td>
                                            <td>
                                                @if (!empty($totalMarks))
                                                    {{ $totalMarks }}
                                                @else
                                                    <span>N/A</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if (count($marks) > 0)
                                                    {{ number_format($result, 2) }}
                                                @else
                                                    <span>N/A</span>
                                                @endif

                                            </td>
                                            <td>
                                                @if (count($marks) > 0)
                                                    {{ $grade_name }}
                                                @else
                                                    <span>N/A</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                    {{-- end card --}}



                </div>
            </div>{{-- row --}}

            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-5  text-right">
                    <p>Class Teacher</p>
                </div>
                <div class="col-sm-5  text-right">
                    <p>Head Teacher</p>
                </div>
                <div class="col-sm-1"></div>
            </div>{{-- row --}}

            <div class="row">
                <div class="col-sm-12">
                    <button class="btn btn-primary mb-3" onclick="download()" style="float: right;"
                        id="download_btn">Print</button>
                </div>
            </div>{{-- row --}}
        </div>
    </section>

    {{-- hide browser title and date during printing --}}
    <style>
        @page {
            size: auto;
            margin: 0mm;
        }
    </style>
    {{-- hide browser title and date during printing --}}

    <script>
        function download() {
            // Hide the print button and footer
            document.getElementById('download_btn').style.display = 'none';
            document.getElementById('foot').style.display = 'none';
            document.getElementById('back').style.display = 'none';

            // Hide DataTable components
            $('#example_filter').hide(); // Search bar
            $('#example_paginate').hide(); // Pagination
            $('#example_info').hide(); // "Showing X to Y of Z entries" text
            $('#example_length').hide(); // "Show X entries" dropdown

            // Print the document
            window.print();

            // Restore visibility after printing
            document.getElementById('download_btn').style.display = 'block';
            document.getElementById('download_btn').style.float = 'right';
            document.getElementById('foot').style.display = 'block';
            document.getElementById('back').style.display = 'block';
            $('#example_filter').show();
            $('#example_paginate').show();
            $('#example_info').show();
            $('#example_length').show();
        }
    </script>
@endsection
