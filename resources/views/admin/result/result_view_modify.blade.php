@extends('admin.admin_master')

@section('title')
    Result Modification
@endsection



@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    @if (session('sms'))
                        <div class="alert alert-danger">
                            <h4 class="text-center">{{ Session::get('sms') }}</h4>
                        </div>
                    @endif
                    <div class="card" id="content">
                        <div class="card-header">
                            <h4>Student Result View And Edit.

                            </h4>

                            <div class="row mt-3">
                                <div class="col-sm-6">
                                    <span>Student Name:</span> <strong>{{ $student->name }}</strong>
                                </div>

                                <div class="col-sm-6 text-right">
                                    <span>Class:</span> <strong>{{ $class->class_name }}</strong>
                                </div>

                            </div>{{-- row --}}

                            <div class="row mt-3">
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
                                            <th>Action</th>

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
                                                    @if ($mark->subject->type=='optional')
                                                    (<strong>Mark above 40</strong>)
                                                    @endif
                                                </td>
                                                <td>
                                                    {{ $countedGradePoint }}
                                                    @if ($mark->subject->type=='optional')
                                                    (<strong>Gpa above 2</strong>)
                                                    @endif

                                                </td>
                                                <td>{{ $grade_name }}</td>
                                                <td>
                                                    <a href="{{ route('admin.result.edit', [
                                                    'id'=>$mark->id,
                                                     'registration'=>$student->registration,
                                                     'clas_id'=>$class->id,
                                                     'session_id'=>$session->id,
                                                     'exam_id'=>$exam->id
                                                    ]) }}"
                                                        class="btn btn-info btn-sm" title="Edit"><i
                                                            class="las la-pen"></i></a>
                                                    <a href="{{ route('admin.result.delete', $mark->id) }}"
                                                        class="btn btn-danger btn-sm" onclick="confirmation(event)"
                                                        title="Delete"><i class="las la-trash"></i></a>
                                                </td>

                                            </tr>
                                        @endforeach

                                        @php
                                            // Calculate the total result
                                            if ($x == 'fail') {
                                                $result = 0;
                                            } else {
                                                $result = $totalGradePoint / ($totalSubjects - 1);
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
                    </div>
                </div>
            </div>{{-- main row --}}

        </div>
    </section>


@endsection
