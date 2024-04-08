@extends('frontend.frontend_master')

@section('title')
Student Result View
@endsection

<style>
    .formStyle{
        background: #ffe0f3  !important;
    }
</style>

@section('content')

<div class="banner-agile">

    @include('frontend.body.menu')
    <div class="form-w3l py-5">
		<div class="py-xl-5 py-lg-3">
			<h3 class="title text-capitalize font-weight-light text-dark text-center mb-5">Student
				<span class="font-weight-bold">Result</span>
			</h3>
			<div class="register-form pt-md-4">
				<div class="container">
                    <div class="row">
                      <div class="col-sm-12">
                         <div class="card" id="result">

                             <div class="card-header formStyle">
                                 <div class="row mt-3">
                                     <div class="col-sm-6">
                                     <span>Student Name:</span> <strong>{{ $student->name }}</strong>
                                     </div>

                                     <div class="col-sm-6">
                                     <span>Roll:</span> <strong>{{ $student->roll }}</strong>
                                     </div>

                                 </div>{{-- row --}}

                                 <div class="row mt-3">
                                     <div class="col-sm-6">
                                         <span>Registration:</span> <strong>{{ $student->registration }}</strong>
                                      </div>

                                      <div class="col-sm-6">
                                         <span>Class:</span> <strong>{{ $student->clas->class_name }}</strong>
                                      </div>
                                 </div>{{-- row --}}

                                 <div class="row mt-3">

                                     <div class="col-sm-6">
                                         <span>Session:</span> <strong>{{ $student->session->session_year }}</strong>
                                      </div>

                                     <div class="col-sm-6">
                                         <span>Examination:</span> <strong>{{ $exam->exam_name }}</strong>
                                      </div>
                                 </div>{{-- row --}}
                             </div>{{-- card header --}}
                             @if (count($marks)>0)
                                 <div class="card-body formStyle">
                                     <table class="table table-bordered">
                                       <thead>
                                          <tr>
                                              <th>Sl</th>
                                              <th>Subject</th>
                                              <th>Mark</th>
                                              <th>Grade Point</th>
                                              <th>Grade</th>
                                          </tr>
                                       </thead>

                                       <tbody>
                                         @php
                                             $totalGradePoint = 0;
                                             $totalSubjects = count($marks);
                                             $x='';
                                         @endphp
                                          @foreach ($marks as $key=>$mark)

                                         @php
                                             if ($mark->mark <= 100 && $mark->mark >= 80) {
                                             $gradePoint = 5.00;
                                             $grade_name = 'A+';
                                         } elseif ($mark->mark <= 79 && $mark->mark >= 70) {
                                             $gradePoint = 4.00;
                                             $grade_name = 'A';
                                         } elseif ($mark->mark <= 69 && $mark->mark >= 60) {
                                             $gradePoint = 3.50;
                                             $grade_name = 'A-';
                                         } elseif ($mark->mark <= 59 && $mark->mark >= 50) {
                                             $gradePoint = 3.00;
                                             $grade_name = 'B';
                                         } elseif ($mark->mark <= 49 && $mark->mark >= 40) {
                                             $gradePoint = 2.50;
                                             $grade_name = 'C';
                                         } elseif ($mark->mark <= 39 && $mark->mark >= 33) {
                                             $gradePoint = 2.00;
                                             $grade_name = 'D';
                                         } elseif($mark->mark<33) {
                                             $gradePoint = 0;
                                             $grade_name = 'F';
                                         }


                                         // Check if the grade point is 0 for any subject
                                         if ($gradePoint == 0) {
                                             $x = 'fail';
                                              //break; // No need to continue, as the result is already 0
                                         } else{
                                             $totalGradePoint += $gradePoint;
                                         }


                                         @endphp

                                         <tr>
                                             <td>{{ $key+1 }}</td>
                                             <td>{{ $mark->subject->subject }}</td>
                                             <td>{{ $mark->mark }}</td>
                                             <td>{{ $gradePoint  }}</td>
                                             <td>{{ $grade_name }}</td>
                                         </tr>
                                          @endforeach

                                          @php
                                              // Calculate the result
                                                 if ($x =='fail') {

                                                     $result = 0;
                                                 } else {
                                                     $result = $totalGradePoint / $totalSubjects;
                                                 }
                                          @endphp

                                          <?php
                                          //calculate the grade name
                                          if($result ==5.00){
                                             $grade_name = 'A+';
                                          } elseif($result<5.00 && $result>=4.00){
                                             $grade_name = 'A';
                                          } elseif($result>=3.50 && $result<4.00){
                                             $grade_name = 'A-';
                                          } elseif($result>=3.00 && $result<3.50){
                                             $grade_name = 'B';
                                          } elseif($result<3.00 && $result>2.50){
                                             $grade_name = 'C';
                                          } elseif($result<=2.50 && $result>=2.00){
                                             $grade_name = 'D';
                                          } else{
                                             $grade_name = 'F';
                                          }
                                          ?>

                                          <tr>
                                             <td colspan="3" class="text-center">Result</td>
                                             <th>GPA={{ number_format($result,2) }}</th>
                                             <th>Grade={{ $grade_name }}</th>
                                          </tr>
                                       </tbody>
                                     </table>
                                 </div>

                                 @else
                                     <div class="card-body">
                                         <h4 class="text-danger text-center">No Result Found....Please try again.</h4>
                                     </div>
                                 @endif{{-- card body --}}
                         </div>

                      </div>
                    </div>{{-- main row --}}

                    @if (count($marks)>0)
                    <div class="row mt-3">
                        <div class="col-sm-12">
                            <button class="btn btn-primary" onclick="downloadResult()" id="downloadBtn" style="float: right;">Download && Print</button>
                        </div>
                    </div>{{-- row --}}
                    @endif

                 </div>{{-- container --}}
			</div>
		</div>
	</div>

</div>{{-- banner agile --}}


<script>
    function downloadResult(){
        document.getElementById('loginBtn').style.display='none';
        document.getElementById('downloadBtn').style.display='none';
        document.getElementById('sicon').style.display='none';
        window.print();
        document.getElementById('loginBtn').style.display='block';
        document.getElementById('downloadBtn').style.display='block';
        document.getElementById('sicon').style.display='block';
    }
</script>


@endsection
