 @extends('admin.admin_master')

@section('title')
    @if (Session::get('adminId'))
    Admin Dashboard
    @endif

    @if (Session::get('teacherId'))
    Teacher Dashboard
    @endif
@endsection

@section('content')
<section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-4 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
                @php
                $teachers = App\Models\Teacher::all();
                @endphp
            <p>All Teacher({{count($teachers)}})</p>
            </div>
            <div class="icon">
                
            </div>
            <a href="{{route('admin.all.teacher')}}" class="small-box-footer">All Teacher <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
                @php
                $students = App\Models\Student::all();
                @endphp
              <p>All Student:{{count($students)}}</p>
            </div>
            <div class="icon">
                
            </div>
            <a href="{{route('admin.all.student')}}" class="small-box-footer">All Student <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
                
                  @php
                $applicants = App\Models\Student::where('status',0)->get();
                @endphp
              
              <p>Student Application List:{{count($applicants)}}</p>
            </div>
            <div class="icon">
            </div>
            <a href="{{route('admin.admission.student')}}" class="small-box-footer">Applicant List <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        
        <!-- ./col -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
@endsection


