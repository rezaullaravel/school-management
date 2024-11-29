@extends('admin.admin_master')

@section('title')
    Class Wise Result View
@endsection

@section('content')
    <section class="content">
        <div class="container-fluid pt-3">
            <div class="row">
                <div class="col-sm-12">
                    <a href="{{ url('admin/result/by-class') }}" class="btn btn-primary btn-sm" style="float: right;">Back</a>
                </div>
            </div>
            <div class="row">

            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Class Wise Result View

                            </h4>
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
                                        <th>Roll</th>
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
                                            $totalSubjects = count($marks);
                                            $totalMarks = $marks->sum('mark');
                                            $x = '';

                                        @endphp
                                       @if (count($marks)>0)

                                        @foreach ($marks as $key => $mark)
                                            @php
                                                if ($mark->mark <= 100 && $mark->mark >= 80) {
                                                    $gradePoint = 5.0;
                                                    $grade_name = 'A+';
                                                } elseif ($mark->mark <= 79 && $mark->mark >= 70) {
                                                    $gradePoint = 4.0;
                                                    $grade_name = 'A';
                                                } elseif ($mark->mark <= 69 && $mark->mark >= 60) {
                                                    $gradePoint = 3.5;
                                                    $grade_name = 'A-';
                                                } elseif ($mark->mark <= 59 && $mark->mark >= 50) {
                                                    $gradePoint = 3.0;
                                                    $grade_name = 'B';
                                                } elseif ($mark->mark <= 49 && $mark->mark >= 40) {
                                                    $gradePoint = 2.5;
                                                    $grade_name = 'C';
                                                } elseif ($mark->mark <= 39 && $mark->mark >= 33) {
                                                    $gradePoint = 2.0;
                                                    $grade_name = 'D';
                                                } elseif ($mark->mark < 33) {
                                                    $gradePoint = 0;
                                                    $grade_name = 'F';
                                                }

                                                // Check if the grade point is 0 for any subject
                                                if ($gradePoint == 0) {
                                                    $x = 'fail';
                                                    //break; // No need to continue, as the result is already 0
                                                } else {
                                                    $totalGradePoint += $gradePoint;
                                                }

                                            @endphp
                                        @endforeach

                                        @php
                                            // Calculate the result
                                            if ($x == 'fail') {
                                                $result = 0;
                                            } else {
                                                $result = $totalGradePoint / $totalSubjects;
                                            }
                                        @endphp
                                    @endif

                                        <?php
                                        //calculate the grade name
                                        if(count($marks)>0){
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
                                            <td>{{ $row->roll }}</td>
                                            <td>{{ $row->registration }}</td>
                                            <td>
                                                @if (!empty($totalMarks))
                                                {{ $totalMarks }}
                                                @endif
                                            </td>
                                            <td>
                                                @if (count($marks)>0)
                                                   {{ number_format($result, 2) }}
                                                @endif
                                            </td>
                                            <td>
                                                @if (count($marks)>0)
                                                {{ $grade_name }}
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
