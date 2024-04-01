@extends('admin.admin_master')
@section('title')
@if (Session::get('adminId'))
Admin Dashboard
@endif
@if (Session::get('teacherId'))
Teacher Dashboard
@endif

@if (Session::get('studentId'))
Student Dashboard
@endif

@if (Session::get('guardianId'))
Guardian Dashboard
@endif

@endsection
@section('content')
@if(Session::get('adminId'))
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
   </div>
   <!-- /.container-fluid -->
</section>
@endif
@if (Session::get('studentId'))
<section class="content">
   <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
         <div class="col-sm-8 offset-sm-2">
            <div class="card card-primary card-outline">
               <div class="card-header">
                  <h4>Your Profile.
                  </h4>
               </div>
               @php
               $student = App\Models\Student::where('id',Session::get('studentId'))->first();
               @endphp
               {{-- card body --}}
               <form action="{{ route('student.profile.update',$student->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                  <div class="card-body box-profile">
                     <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle" src="{{ $student->image ? asset($student->image)  : asset('backend/dist/img/avatar5.png') }}" alt="Student profile picture">
                     </div>
                     <h3 class="profile-username text-center">
                        <input type="text" name="name" value="{{ $student->name }}" class="form-control text-center">
                        @error('name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                     </h3>
                     <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                           <b>Phone</b> <a class="float-right">
                           <input type="text" name="phone" value=" {{$student->phone }} " class="form-control">
                           </a> <br>
                           @error('phone')
                           <span class="text-danger">{{ $message }}</span>
                           @enderror
                        </li>
                        <li class="list-group-item">
                           <b>Email</b> <a class="float-right">
                           <input type="text" name="email" value=" {{$student->email }} " class="form-control">
                           </a> <br>
                           @error('email')
                           <span class="text-danger">{{ $message }}</span>
                           @enderror
                        </li>
                        <li class="list-group-item">
                           <b>Profile Picture</b> <a class="float-right">
                           <input type="file" name="image" class="form-control">
                           </a>
                        </li>
                        <li class="list-group-item">
                           <input type="submit" value="Update Profile" class="form-control btn btn-primary">
                        </li>
                     </ul>
                  </div>
               </form>
               {{-- card body --}}
            </div>
         </div>
      </div>
      <!-- /.row -->
   </div>
   <!-- /.container-fluid -->
</section>
@endif
@endsection
