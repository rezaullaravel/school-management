@extends('admin.admin_master')
@section('title')
    {{ $title }}
@endsection

@section('content')
    <section class="content">
        <div class="container-fluid" style="padding-top:20px;">
            <div class="row">
                <div class="col-sm-10 offset-sm-1 text-right">
                    <a href="{{ url('admin/result/view') }}" class="btn btn-primary" id="back">Back</a>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-12">

                    <div class="card" id="result">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-12">
                                    <h2 class="text-center" style="color: rgb(37, 37, 184);font-family:cambria;">Sherkole
                                        Samjan Ali High School
                                    </h2>
                                    <p class="text-center" style="color: rgb(37, 37, 184)">
                                        <span>Post Office- Sherkole,</span><span> Thana- Singra,</span> <span>District-
                                            Natore</span>
                                    </p>

                                </div>
                            </div>{{-- row --}}

                            <div class="row  text-center" style="color: rgb(37, 37, 184); margin-top:-12px;">
                                <div class="col-sm-4">
                                    <span>School Code- 2204</span>
                                </div>
                                <div class="col-sm-4">
                                    <span>Established- 1942</span>
                                </div>
                                <div class="col-sm-4">
                                    <span>EIIN No- 124256</span>
                                </div>

                            </div>{{-- row --}}

                            <div class="row text-center" style="color: rgb(37, 37, 184)">
                                <div class="col-sm-4">
                                    <span>Mobile NO- 01309124256, 01718891698</span>
                                </div>
                                <div class="col-sm-4"></div>
                                <div class="col-sm-4">
                                    <span>Email- samjanali124256@gmail.com </span>
                                </div>
                            </div>{{-- row --}}

                            <h4 class="text-center" style="color: rgb(244, 164, 16)">Result Sheet
                            </h4>

                            <div class="row">
                                <div class="col-sm-6">
                                    <span>Student Name:</span> <strong>{{ $student->name }}</strong>
                                </div>
                                <div class="col-sm-6 text-right">
                                    <span>Class:</span> <strong>{{ $class->class_name }}</strong>
                                </div>
                                {{-- <div class="col-sm-2">
                                    <span>Session:</span> <strong>{{ $student->section->section_name }}</strong>
                                </div> --}}
                                {{-- <div class="col-sm-2">
                                    <span>Roll:</span> <strong>{{ $student->roll }}</strong>
                                </div> --}}


                            </div>{{-- row --}}


                            <div class="row mt-2">
                                <div class="col-sm-6">
                                    <span>Registration:</span> <strong>{{ $student->registration }}</strong>
                                </div>

                                <div class="col-sm-6 text-right">
                                    <span>Session:</span> <strong>{{ $session->session_year }}</strong>
                                </div>
                            </div>{{-- row --}}

                            <div class="row mt-3">
                                <div class="col-sm-12 text-center h4">
                                    <span>Exam Name:</span> <strong>{{ $exam->exam_name }}</strong>
                                </div>
                            </div>{{-- row --}}
                        </div>
                        {{-- calculate total mark --}}


                        @if (count($marks) > 0)
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Sl</th>
                                            <th>Subject </th>
                                            <th>Mark(Grade Point)</th>
                                            <th>Mark(Count)</th>
                                            <th>Grade Point(Count)</th>
                                            <th>Grade</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @php
                                            $totalGradePoint = 0;
                                            $totalMarks = 0;
                                            $totalSubjects = count($marks);
                                            $x = '';
                                        @endphp
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
                                                if ($originalGradePoint == 0 && $mark->subject->type == 'mandatory') {
                                                    $x = 'fail';
                                                    //break; // No need to continue, as the result is already 0
                                                } else {
                                                    $totalGradePoint += $countedGradePoint;
                                                    $totalMarks += $countedMark;
                                                }

                                            @endphp

                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $mark->subject->subject }}
                                                    @if ($mark->subject->type == 'optional')
                                                        <span>({{ $mark->subject->type }})</span>
                                                    @endif
                                                </td>
                                                <td>{{ $mark->mark }}({{ $originalGradePoint }})</td>
                                                <td>{{ $countedMark }}
                                                    @if ($mark->subject->type == 'optional')
                                                        (<strong>Mark above 40</strong>)
                                                    @endif
                                                </td>
                                                <td>
                                                    {{ $countedGradePoint }}
                                                    @if ($mark->subject->type == 'optional')
                                                        (<strong>Gpa above 2</strong>)
                                                    @endif

                                                </td>
                                                <td>{{ $grade_name }}</td>
                                            </tr>
                                        @endforeach

                                        @php

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

                                        <?php
                                        //calculate the total grade name
                                        if ($result == 5.0) {
                                            $t_grade_name = 'A+';
                                        } elseif ($result < 5.0 && $result >= 4.0) {
                                            $t_grade_name = 'A';
                                        } elseif ($result >= 3.5 && $result < 4.0) {
                                            $t_grade_name = 'A-';
                                        } elseif ($result >= 3.0 && $result < 3.5) {
                                            $t_grade_name = 'B';
                                        } elseif ($result < 3.0 && $result > 2.5) {
                                            $t_grade_name = 'C';
                                        } elseif ($result <= 2.5 && $result >= 2.0) {
                                            $t_grade_name = 'D';
                                        } else {
                                            $t_grade_name = 'F';
                                        }
                                        ?>

                                        <tr>
                                            <td colspan="3" class="text-center">Result</td>
                                            <th>Total Mark={{ $totalMarks }}</th>
                                            <th>GPA={{ number_format($result, 2) }}</th>
                                            <th>Grade={{ $t_grade_name }}</th>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>
                        @else
                            <div class="card-body">
                                <h4 class="text-danger text-center">No Result Found....Please try again.</h4>
                            </div>
                        @endif

                        <div class="row">
                            <div class="card-body">
                                <div class="col-md-4">
                                    <p style="font-size: 12px;">Date Of Publication:
                                        {{ date('d-m-Y,l', strtotime($result_date)) }}</p>

                                </div>
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
                    </div>{{-- card --}}
                </div>{{-- col-sm-12 --}}
            </div>{{-- main row --}}
            @if (count($marks) > 0)
                <div class="row mb-3">
                    <div class="col-sm-12">
                        <button class="btn btn-info" onclick="download()" style="float: right;"
                            id="download_btn">Print</button>
                    </div>
                </div>{{-- row --}}
            @endif

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
            document.getElementById('download_btn').style.display = 'none';
            document.getElementById('foot').style.display = 'none';
            document.getElementById('back').style.display = 'none';
            window.print();
            document.getElementById('download_btn').style.display = 'block';
            document.getElementById('download_btn').style.float = 'right';
        }
    </script>





@endsection
