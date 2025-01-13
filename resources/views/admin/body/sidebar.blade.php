<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    @if (Session::get('adminId'))
        <a href="{{ route('admin.dashboard') }}" class="brand-link">

            <span class="brand-text font-weight-light pl-3">Admin Dashboard</span>
        </a>
    @endif

    @if (Session::get('teacherId'))
        <a href="{{ route('teacher.dashboard') }}" class="brand-link">
            <img src="{{ asset('/') }}backend/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
                class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">Teacher Dashboard</span>
        </a>
    @endif

    @if (Session::get('guardianId'))
        <a href="{{ route('guardian.dashboard') }}" class="brand-link">
            <img src="{{ asset('/') }}backend/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
                class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">Guardian Dashboard</span>
        </a>
    @endif


    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (Session::get('adminId'))
            @php
                $admin = App\Models\Admin::where('id', Session::get('adminId'))->first();
            @endphp
            <div class="user-panel d-flex mb-3 mt-3 pb-3">
                <div class="image">
                    <img src="{{ $admin->image ? asset($admin->image) : asset('backend/dist/img/avatar5.png') }}"
                        class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">{{ $admin->name }}</a>
                </div>
            </div>
        @endif


        @if (Session::get('teacherId'))
            @php
                $teacher = App\Models\Teacher::where('id', Session::get('teacherId'))->first();
            @endphp
            <div class="user-panel d-flex mb-3 mt-3 pb-3">
                <div class="image">
                    <img src="{{ $teacher->image ? asset($teacher->image) : asset('backend/dist/img/avatar5.png') }}"
                        class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">{{ $teacher->name }}</a>
                </div>
            </div>
        @endif


        @if (Session::get('studentId'))
            @php
                $student = App\Models\Student::where('id', Session::get('studentId'))->first();
            @endphp
            <div class="user-panel d-flex mb-3 mt-3 pb-3">
                <div class="image">
                    <img src="{{ $student->image ? asset($student->image) : asset('backend/dist/img/avatar5.png') }}"
                        class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="{{ route('student.dashboard') }}" class="d-block">{{ $student->name }}</a>
                </div>
            </div>
          @endif


        @if (Session::get('guardianId'))
            @php
                $guardian = App\Models\Guardian::where('id', Session::get('guardianId'))->first();
            @endphp
            <div class="user-panel d-flex mb-3 mt-3 pb-3">
                <div class="image">
                    <img src="{{ $guardian->image ? asset($guardian->image) : asset('backend/dist/img/avatar5.png') }}"
                        class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">{{ $guardian->name }}</a>
                </div>
            </div>
        @endif



        <!-- SidebarSearch Form -->

        @if (Session::get('adminId'))
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">

                    {{-- <li class="nav-item {{ request()->is('admin/class*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ request()->is('admin/class*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>
                                Class
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.all.class') }}"
                                    class="nav-link {{ request()->is('admin/class/all') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>All Class</p>
                                </a>
                            </li>
                        </ul>
                    </li>


                    <li class="nav-item {{ request()->is('admin/section*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ request()->is('admin/section*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>
                                Section
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.all.section') }}"
                                    class="nav-link {{ request()->is('admin/section/all') ? 'active' : '' }}"
                                    >
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>All Section</p>
                                </a>
                            </li>
                        </ul>
                    </li>


                    <li class="nav-item {{ request()->is('admin/session*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ request()->is('admin/session*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>
                                Session
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.all.session') }}"
                                    class="nav-link {{ request()->is('admin/session/all') ? 'active' : '' }}"
                                    >
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>All Session</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item {{ request()->is('admin/subject*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ request()->is('admin/subject*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>
                                Subject
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.all.subject') }}"
                                    class="nav-link {{ request()->is('admin/subject/all') ? 'active' : '' }}"
                                    >
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Subject List</p>
                                </a>
                            </li>
                        </ul>
                    </li> --}}

                    <li class="nav-item {{ request()->is('admin/class*') || request()->is('admin/section*') || request()->is('admin/session*') || request()->is('admin/subject*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ request()->is('admin/class*') || request()->is('admin/section*') || request()->is('admin/session*') || request()->is('admin/subject*') ? 'active' : '' }}">
                          <i class="nav-icon fas fa-chart-pie"></i>
                          <p>
                            Academic
                            <i class="right fas fa-angle-left"></i>
                          </p>
                        </a>
                        <ul class="nav nav-treeview">
                          <li class="nav-item">
                            <a href="{{ route('admin.all.class') }}" class="nav-link {{ request()->is('admin/class/all') ? 'active' : '' }}">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Class</p>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a href="{{ route('admin.all.section') }}" class="nav-link {{ request()->is('admin/section*') ? 'active' : '' }}">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Section</p>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a href="{{ route('admin.all.session') }}" class="nav-link {{ request()->is('admin/session*') ? 'active' : '' }}">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Session</p>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a href="{{ route('admin.all.subject') }}" class="nav-link {{ request()->is('admin/subject/all') ? 'active' : '' }}">
                              <i class="far fa-circle nav-icon"></i>
                              <p>Subject</p>
                            </a>
                          </li>
                        </ul>
                      </li>



                    <li class="nav-item {{ request()->is('admin/designation*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ request()->is('admin/designation*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>
                                Designation
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.all.designation') }}"
                                    class="nav-link {{ request()->is('admin/designation/all') ? 'active' : '' }}"
                                    >
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>All Designation</p>
                                </a>
                            </li>
                        </ul>
                    </li>


                    <li class="nav-item {{ request()->is('admin/student*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ request()->is('admin/student*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>
                                Student
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.all.student') }}"
                                    class="nav-link {{ request()->is('admin/student/all') ? 'active' : '' }}"
                                    >
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>All Student</p>
                                </a>
                            </li>
                        </ul>
                    </li>


                    <li class="nav-item {{ request()->is('admin/teacher*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ request()->is('admin/teacher*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>
                                Teacher
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.all.teacher') }}"
                                    class="nav-link {{ request()->is('admin/teacher/all') ? 'active' : '' }}"
                                    >
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>All Teacher</p>
                                </a>
                            </li>
                        </ul>
                    </li>





                    <li class="nav-item {{ request()->is('admin/attendence*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ request()->is('admin/attendence*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>
                                Attendence
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.student.attendence') }}"
                                    class="nav-link {{ request()->is('admin/attendence/student') ? 'active' : '' }}"
                                    >
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Student Attendence</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('admin.student.attendence.report') }}"
                                    class="nav-link {{ request()->is('admin/attendence/student/report') ? 'active' : '' }}"
                                    >
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Student Attendence Report</p>
                                </a>
                            </li>
                        </ul>
                    </li>




                    <li class="nav-item {{ request()->is('admin/exam*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ request()->is('admin/exam*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>
                                Exam
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.all.exam') }}"
                                    class="nav-link {{ request()->is('admin/exam/all') ? 'active' : '' }}"
                                    >
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Exam List</p>
                                </a>
                            </li>
                        </ul>
                    </li>


                    <li class="nav-item {{ request()->is('admin/mark*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ request()->is('admin/mark*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>
                                Mark
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.mark.assign') }}"
                                    class="nav-link {{ request()->is('admin/mark/assign') ? 'active' : '' }}"
                                    >
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Mark Assign</p>
                                </a>
                            </li>
                        </ul>
                    </li>


                    <li class="nav-item {{ request()->is('admin/result*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ request()->is('admin/result*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>
                                Result
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.result.view') }}"
                                    class="nav-link {{ request()->is('admin/result/view') ? 'active' : '' }}"
                                    >
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Get Result</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('admin.result.by.class') }}"
                                    class="nav-link {{ request()->is('admin/result/by-class') ? 'active' : '' }}"
                                    >
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Get Result By Class</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('admin.result.modify') }}"
                                    class="nav-link {{ request()->is('admin/result/modify') ? 'active' : '' }}"
                                    >
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Modify Result</p>
                                </a>
                            </li>
                        </ul>
                    </li>


                    <li class="nav-item {{ request()->is('admin/admission*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ request()->is('admin/admission*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>
                                Admission
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.admission.student') }}"
                                    class="nav-link {{ request()->is('admin/admission/student') ? 'active' : '' }}"
                                    >
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Application List</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    {{-- <li class="nav-item {{ request()->is('admin/sub_category*') ? 'menu-open' : '' }}">
                        <a href="#"
                            class="nav-link {{ request()->is('admin/sub_category*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>
                                SubCategory
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.all.subCategory') }}"
                                    class="nav-link {{ request()->is('admin/sub_category/all') ? 'active' : '' }}"
                                    >
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>SubCategory List</p>
                                </a>
                            </li>
                        </ul>
                    </li> --}}


                    <li class="nav-item {{ request()->is('admin/slider*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ request()->is('admin/slider*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>
                                Slider
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.slider.all') }}"
                                    class="nav-link {{ request()->is('admin/slider/all') ? 'active' : '' }}"
                                    >
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>All Slider</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item {{ request()->is('admin/notice*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ request()->is('admin/notice*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>
                                Notice
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.all.notice') }}"
                                    class="nav-link {{ request()->is('admin/notice/all') ? 'active' : '' }}"
                                    >
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>All Notice</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    {{-- clas routine start --}}
                    <li class="nav-item {{ request()->is('admin/Class/routine*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ request()->is('admin/Class/routine*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>
                                Class Routine
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.class.routine') }}"
                                    class="nav-link {{ request()->is('admin/Class/routine') ? 'active' : '' }}"
                                    >
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Add Class Routine</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    {{-- clas routine end --}}


                    {{-- exam routine start --}}
                    <li class="nav-item {{ request()->is('admin/e_xamination/routine*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ request()->is('admin/e_xamination/routine*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>
                                Exam Routine
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.examination.routine') }}"
                                    class="nav-link {{ request()->is('admin/e_xamination/routine') ? 'active' : '' }}"
                                    >
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Add Exam Routine</p>
                                </a>
                            </li>
                        </ul>

                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.examination.routine.manage') }}"
                                    class="nav-link {{ request()->is('admin/e_xamination/routine/manage') ? 'active' : '' }}"
                                    >
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Manage Exam Routine</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    {{-- exam routine end --}}


                    {{-- student id card --}}
                    <li class="nav-item {{ request()->is('admin/_student-idcard/generate*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ request()->is('admin/_student-idcard/generate*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>
                                Student Id Card
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.student-idcard.generate') }}"
                                    class="nav-link {{ request()->is('admin/_student-idcard/generate') ? 'active' : '' }}"
                                    >
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Id Card Generate</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    {{-- student id card end --}}


                    {{-- student fees collection --}}
                    <li class="nav-item {{ request()->is('admin/fees*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ request()->is('admin/fees*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>
                                Fees Collection
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.fees.category') }}"
                                    class="nav-link {{ request()->is('admin/fees/category') ? 'active' : '' }}"
                                    >
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Fees Category</p>
                                </a>
                            </li>
                        </ul>

                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.fees.assign') }}"
                                    class="nav-link {{ request()->is('admin/fees/assign') ? 'active' : '' }}"
                                    >
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Fees Assign</p>
                                </a>
                            </li>
                        </ul>

                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.fees.manage') }}"
                                    class="nav-link {{ request()->is('admin/fees/manage') ? 'active' : '' }}"
                                    >
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Fees Manage</p>
                                </a>
                            </li>
                        </ul>

                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.total.fee') }}"
                                    class="nav-link {{ request()->is('admin/fees/total') ? 'active' : '' }}"
                                    >
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Fees Total</p>
                                </a>
                            </li>
                        </ul>

                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.fees.collection') }}"
                                    class="nav-link {{ request()->is('admin/fees/collection') ? 'active' : '' }}"
                                    >
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Fees Collection</p>
                                </a>
                            </li>
                        </ul>

                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.fees.collection.report') }}"
                                    class="nav-link {{ request()->is('admin/fees/collection/report') ? 'active' : '' }}"
                                    >
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Fees Collection Report</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    {{-- student fees collection end --}}


                    {{-- student promotion system --}}
                    <li class="nav-item {{ request()->is('admin/_student_promotion*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ request()->is('admin/_student_promotion*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>
                                Student Promotion
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.student_promotion') }}"
                                    class="nav-link {{ request()->is('admin/_student_promotion') ? 'active' : '' }}"
                                    >
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Promotion</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    {{-- student promotion system end --}}


                    {{-- payment --}}
                    <li class="nav-item {{ request()->is('admin/payment*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ request()->is('admin/payment*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>
                                Payment
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.all.payment') }}"
                                    class="nav-link {{ request()->is('admin/payment/all') ? 'active' : '' }}"
                                    >
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Payment History</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    {{-- payment end --}}


                    <li class="nav-item {{ request()->is('admin/frontend/setting*') ? 'menu-open' : '' }}">
                        <a href="#"
                            class="nav-link {{ request()->is('admin/frontend/setting*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            Frontend Setting
                            <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.frontend.setting.logo') }}"
                                    class="nav-link {{ request()->is('admin/frontend/setting/logo') ? 'active' : '' }}"
                                    >
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Logo Setting</p>
                                </a>
                            </li>
                        </ul>

                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.frontend.setting.title') }}"
                                    class="nav-link {{ request()->is('admin/frontend/setting/title') ? 'active' : '' }}"
                                    >
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Title & Date Setting</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.frontend.setting.principal') }}"
                                    class="nav-link {{ request()->is('admin/frontend/setting/principal') ? 'active' : '' }}"
                                    >
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Principal Data</p>
                                </a>
                            </li>
                        </ul>
                    </li>


                    <li class="nav-item {{ request()->is('admin/setting*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ request()->is('admin/setting*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>
                                Setting
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>

                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.setting.profile') }}"
                                    class="nav-link {{ request()->is('admin/setting/profile') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Profile</p>
                                </a>
                            </li>
                        </ul>


                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.setting.change-password') }}"
                                    class="nav-link {{ request()->is('admin/setting/change-password') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Password Change</p>
                                </a>
                            </li>
                        </ul>


                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.logout') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Logout</p>
                                </a>
                            </li>
                        </ul>
                    </li>


                </ul>
            </nav>
        @endif

        {{-- teacher all route --}}
        @if (Session::get('teacherId'))
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
                    <li class="nav-item {{ request()->is('teacher/attendence*') ? 'menu-open' : '' }}">
                        <a href="#"
                            class="nav-link {{ request()->is('teacher/attendence*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>
                                Attendence
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('teacher.student.attendence') }}"
                                    class="nav-link {{ request()->is('teacher/attendence/student') ? 'active' : '' }}"
                                    >
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Student Attendence</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('teacher.student.attendence.report') }}"
                                    class="nav-link {{ request()->is('teacher/attendence/student/report') ? 'active' : '' }}"
                                    >
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Student Attendence Report</p>
                                </a>
                            </li>
                        </ul>
                    </li>


                    <li class="nav-item {{ request()->is('teacher/subject*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ request()->is('teacher/subject*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>
                                Subject
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('teacher.all.subject') }}"
                                    class="nav-link {{ request()->is('teacher/subject/all') ? 'active' : '' }}"
                                    >
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Subject List</p>
                                </a>
                            </li>
                        </ul>
                    </li>



                    <li class="nav-item {{ request()->is('teacher/mark*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ request()->is('teacher/mark*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>
                                Mark
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('teacher.mark.assign') }}"
                                    class="nav-link {{ request()->is('teacher/mark/assign') ? 'active' : '' }}"
                                    >
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Mark Assign</p>
                                </a>
                            </li>
                        </ul>
                    </li>


                    <li class="nav-item {{ request()->is('teacher/result*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ request()->is('teacher/result*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>
                                Result
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('teacher.result.view') }}"
                                    class="nav-link {{ request()->is('teacher/result/view') ? 'active' : '' }}"
                                    >
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Get Result</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('teacher.result.modify') }}"
                                    class="nav-link {{ request()->is('teacher/result/modify') ? 'active' : '' }}"
                                    >
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Modify Result</p>
                                </a>
                            </li>
                        </ul>
                    </li>


                    <li class="nav-item {{ request()->is('teacher/setting*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ request()->is('teacher/setting*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>
                                Setting
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>

                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('teacher.setting.profile') }}"
                                    class="nav-link {{ request()->is('teacher/setting/profile') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Profile</p>
                                </a>
                            </li>
                        </ul>


                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('teacher.setting.change-password') }}"
                                    class="nav-link {{ request()->is('teacher/setting/change-password') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Password Change</p>
                                </a>
                            </li>
                        </ul>

                    </li>



                    <li class="nav-item">
                        <a href="{{ route('teacher.logout') }}" class="nav-link">
                            <i class="nav-icon fas fa-chart-pie"></i>Logout
                        </a>
                    </li>


                </ul>
            </nav>
        @endif
        {{-- teacher all route end --}}


        {{-- guardian all route --}}
        @if (Session::get('guardianId'))
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <li class="nav-item {{ request()->is('guardian/attendence*') ? 'menu-open' : '' }}">
                        <a href="#"
                            class="nav-link {{ request()->is('guardian/attendence*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>
                                Attendence
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">


                            <li class="nav-item">
                                <a href="{{ route('guardian.student.attendence.report') }}"
                                    class="nav-link {{ request()->is('guardian/attendence/student/report') ? 'active' : '' }}"
                                    >
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Student Attendence Report</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item {{ request()->is('guardian/payment*') ? 'menu-open' : '' }}">
                        <a href="#"
                            class="nav-link {{ request()->is('guardian/payment*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>
                                Payment
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">


                            <li class="nav-item">
                                <a href="{{ route('guardian.payment') }}"
                                    class="nav-link {{ request()->is('guardian/payment') ? 'active' : '' }}"
                                    >
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Give Payment</p>
                                </a>
                            </li>
                        </ul>
                    </li>


                    <li class="nav-item {{ request()->is('guardian/setting*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ request()->is('guardian/setting*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>
                                Setting
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>

                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('guardian.setting.profile') }}"
                                    class="nav-link {{ request()->is('guardian/setting/profile') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Profile</p>
                                </a>
                            </li>
                        </ul>


                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('guardian.setting.change-password') }}"
                                    class="nav-link {{ request()->is('guardian/setting/change-password') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Password Change</p>
                                </a>
                            </li>
                        </ul>

                    </li>


                    <li class="nav-item">
                        <a href="{{ route('guardian.logout') }}" class="nav-link">
                            <i class="nav-icon fas fa-chart-pie"></i>Logout
                        </a>
                    </li>


                </ul>
            </nav>
        @endif
        {{-- guardian all route end --}}


        {{-- student all route start --}}
        @if (Session::get('studentId'))
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <li class="nav-item {{ request()->is('student/class-routine*') ? 'menu-open' : '' }}">
                        <a href="#"
                            class="nav-link {{ request()->is('student/class-routine*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>
                                Class Routine
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">


                            <li class="nav-item">
                                <a href="{{ route('student.class.routine.view') }}"
                                    class="nav-link {{ request()->is('student/class-routine/view') ? 'active' : '' }}"
                                    >
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Class Routine</p>
                                </a>
                            </li>
                        </ul>
                    </li>


                    <li class="nav-item {{ request()->is('student/exam-routine*') ? 'menu-open' : '' }}">
                        <a href="#"
                            class="nav-link {{ request()->is('student/exam-routine*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>
                                Exam Routine
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">


                            <li class="nav-item">
                                <a href="{{ route('student.exam.routine.view') }}"
                                    class="nav-link {{ request()->is('student/exam-routine/view') ? 'active' : '' }}"
                                    >
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>View Exam Routine</p>
                                </a>
                            </li>
                        </ul>
                    </li>


                    <li class="nav-item {{ request()->is('student/payment*') ? 'menu-open' : '' }}">
                        <a href="#"
                            class="nav-link {{ request()->is('student/payment*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>
                                Payment
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">


                            <li class="nav-item">
                                <a href="{{ route('student.payment') }}"
                                    class="nav-link {{ request()->is('student/payment/index') ? 'active' : '' }}"
                                    >
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Give Payment</p>
                                </a>
                            </li>
                        </ul>
                    </li>


                    <li class="nav-item">
                        <a href="{{ route('student.passwrod.change') }}" class="nav-link {{ request()->is('student/passwrod/change') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-chart-pie"></i>Change Password
                        </a>
                    </li>


                    <li class="nav-item">
                        <a href="{{ route('student.logout') }}" class="nav-link">
                            <i class="nav-icon fas fa-chart-pie"></i>Logout
                        </a>
                    </li>


                </ul>
            </nav>
        @endif
        {{-- student all route end --}}

    </div>
    <!-- /.sidebar -->
</aside>
