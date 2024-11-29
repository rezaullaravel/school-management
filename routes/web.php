<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\Admin\ExamController;
use App\Http\Controllers\Admin\MarkController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ClassController;
use App\Http\Controllers\StudentAuthController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\GuardianAuthController;
use App\Http\Controllers\Admin\SectionController;
use App\Http\Controllers\Admin\SessionController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\SubjectController;
use App\Http\Controllers\Admin\AdmissionController;
use App\Http\Controllers\Admin\AminProfileController;
use App\Http\Controllers\Admin\DesignationController;
use App\Http\Controllers\Admin\ExamRoutineController;
use App\Http\Controllers\Admin\TeacherCrudController;
use App\Http\Controllers\Admin\ClassRoutineController;
use App\Http\Controllers\Frontend\FrontHomeController;
use App\Http\Controllers\Admin\StudentIdcardController;
use App\Http\Controllers\Admin\FeesCollectionController;
use App\Http\Controllers\Admin\PaymentHistoryController;
use App\Http\Controllers\Admin\FrontendSettingController;
use App\Http\Controllers\Admin\StudentPromotionController;
use App\Http\Controllers\Student\StudentProfileController;
use App\Http\Controllers\Teacher\TeacherProfileController;
use App\Http\Controllers\Admin\StudentAttendenceController;
use App\Http\Controllers\Guardian\GuardianProfileController;
use App\Http\Controllers\Admin\CategorySubCategoryController;


//global route
//ajax for section auto select
Route::get('admin/class/section/ajax/{class_id}', [StudentController::class, 'sectionAutoSelect']);

//ajax for subject auto select
Route::get('admin/getSubjects/{class_id}/{section_id?}', [StudentController::class, 'subjectAutoSelect']);


//=========================== admin all route=========================
Route::get('/admin/login', [AdminController::class, 'adminLoginForm']);
Route::post('/admin-login', [AdminController::class, 'adminPostLogin'])->name('admin.post.login');

Route::prefix('admin')->middleware(['admin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'adminDashboard'])->name('admin.dashboard');

    Route::get('/logout', [AdminController::class, 'adminLogout'])->name('admin.logout');

    //class
    Route::get('/class/all', [ClassController::class, 'allClass'])->name('admin.all.class');
    Route::get('/class/add', [ClassController::class, 'addClass'])->name('admin.add.class');
    Route::post('/class/store', [ClassController::class, 'storeClass'])->name('admin.store.class');
    Route::get('/class/delete/{id}', [ClassController::class, 'deleteClass'])->name('admin.delete.class');
    Route::get('/class/edit/{id}', [ClassController::class, 'editClass'])->name('admin.edit.class');
    Route::post('/class/update', [ClassController::class, 'updateClass'])->name('admin.update.class');

    //section
    Route::get('/section/all', [SectionController::class, 'allSection'])->name('admin.all.section');
    Route::get('/section/add', [SectionController::class, 'addSection'])->name('admin.add.section');
    Route::post('/section/store', [SectionController::class, 'storeSection'])->name('admin.store.section');
    Route::get('/section/delete/{id}', [SectionController::class, 'deleteSection'])->name('admin.delete.section');
    Route::get('/section/edit/{id}', [SectionController::class, 'editSection'])->name('admin.edit.section');
    Route::post('/section/update', [SectionController::class, 'updateSection'])->name('admin.update.section');

    //session
    Route::get('/session/all', [SessionController::class, 'allSession'])->name('admin.all.session');
    Route::get('/session/add', [SessionController::class, 'addSession'])->name('admin.add.session');
    Route::post('/session/store', [SessionController::class, 'storeSession'])->name('admin.store.session');
    Route::get('/session/delete/{id}', [SessionController::class, 'deleteSession'])->name('admin.delete.session');
    Route::get('/session/edit/{id}', [SessionController::class, 'editSession'])->name('admin.edit.session');
    Route::post('/session/update', [SessionController::class, 'updateSession'])->name('admin.update.session');

    //designation
    Route::get('/designation/all', [DesignationController::class, 'allDesignation'])->name('admin.all.designation');
    Route::get('/designation/add', [DesignationController::class, 'addDesignation'])->name('admin.add.designation');
    Route::post('/designation/store', [DesignationController::class, 'storeDesignation'])->name('admin.store.designation');
    Route::get('/designation/delete/{id}', [DesignationController::class, 'deleteDesignation'])->name('admin.delete.designation');
    Route::get('/designation/edit/{id}', [DesignationController::class, 'editDesignation'])->name('admin.edit.designation');
    Route::post('/designation/update', [DesignationController::class, 'updateDesignation'])->name('admin.update.designation');

    //student
    Route::get('/student/all', [StudentController::class, 'allStudent'])->name('admin.all.student');
    Route::get('/student/add', [StudentController::class, 'addStudent'])->name('admin.add.student');
    Route::post('/student/store', [StudentController::class, 'storeStudent'])->name('admin.store.student');
    Route::get('/student/delete/{id}', [StudentController::class, 'deleteStudent'])->name('admin.delete.student');
    Route::get('/student/edit/{id}', [StudentController::class, 'editStudent'])->name('admin.edit.student');
    Route::post('/student/update', [StudentController::class, 'updateStudent'])->name('admin.update.student');

    //teacher
    Route::get('/teacher/all', [TeacherCrudController::class, 'allTeacher'])->name('admin.all.teacher');
    Route::get('/teacher/add', [TeacherCrudController::class, 'addTeacher'])->name('admin.add.teacher');
    Route::post('/teacher/store', [TeacherCrudController::class, 'storeTeacher'])->name('admin.store.teacher');
    Route::get('/teacher/delete/{id}', [TeacherCrudController::class, 'deleteTeacher'])->name('admin.delete.teacher');
    Route::get('/teacher/edit/{id}', [TeacherCrudController::class, 'editTeacher'])->name('admin.edit.teacher');
    Route::post('/teacher/update/{id}', [TeacherCrudController::class, 'updateTeacher'])->name('admin.update.teacher');

    //student attendence
    Route::get('/attendence/student', [StudentAttendenceController::class, 'index'])->name('admin.student.attendence');
    Route::get('/attendence/student/class', [StudentAttendenceController::class, 'classWiseStudent'])->name('admin.student.attendence.class');
    Route::post('/attendence/student/insert', [StudentAttendenceController::class, 'insertAttendence'])->name('admin.attendence.student.insert');
    Route::get('/attendence/student/report', [StudentAttendenceController::class, 'studentAttendenceReport'])->name('admin.student.attendence.report');
    Route::get('/attendence/student/{id}', [StudentAttendenceController::class, 'editStudentAttendenceReport'])->name('admin.attendence.student.edit');
    Route::post('/attendence/student/update', [StudentAttendenceController::class, 'updateStudentAttendenceReport'])->name('admin.attendence.student.update');

    //mark assign to student
    Route::get('/mark/assign', [MarkController::class, 'index'])->name('admin.mark.assign');
    Route::post('/mark/insert', [MarkController::class, 'insert'])->name('admin.mark.insert');

    //result get
    Route::get('/result/view', [MarkController::class, 'viewResult'])->name('admin.result.view');
    Route::get('/result/get', [MarkController::class, 'getResult'])->name('admin.get-result');
    Route::get('/result/by-class', [MarkController::class, 'resultByClass'])->name('admin.result.by.class');
    Route::get('/fetch/result/by-class', [MarkController::class, 'fetchResultByClass'])->name('admin.fetch-result-by-class');
    Route::get('/result/modify', [MarkController::class, 'modifyResult'])->name('admin.result.modify');
    Route::get('/result/view-modify', [MarkController::class, 'getResultForModify'])->name('admin.modify-result');
    Route::get('/result/edit/{id}', [MarkController::class, 'editResult'])->name('admin.result.edit');
    Route::post('/result/update', [MarkController::class, 'updateResult'])->name('admin.update.result');
    Route::get('/result/delete/{id}', [MarkController::class, 'deleteResult'])->name('admin.result.delete');

    //subject
    Route::get('/subject/all', [SubjectController::class, 'allSubject'])->name('admin.all.subject');
    Route::get('/subject/add', [SubjectController::class, 'addSubject'])->name('admin.add.subject');
    Route::post('/subject/store', [SubjectController::class, 'storeSubject'])->name('admin.store.subject');
    Route::get('/subject/delete/{id}', [SubjectController::class, 'deleteSubject'])->name('admin.delete.subject');
    Route::get('/subject/edit/{id}', [SubjectController::class, 'editSubject'])->name('admin.edit.subject');
    Route::post('/subject/update', [SubjectController::class, 'updateSubject'])->name('admin.update.subject');

    //exam
    Route::get('/exam/all', [ExamController::class, 'allExam'])->name('admin.all.exam');
    Route::get('/exam/add', [ExamController::class, 'addExam'])->name('admin.add.exam');
    Route::post('/exam/store', [ExamController::class, 'storeExam'])->name('admin.store.exam');
    Route::get('/exam/delete/{id}', [ExamController::class, 'deleteExam'])->name('admin.delete.exam');
    Route::get('/exam/edit/{id}', [ExamController::class, 'editExam'])->name('admin.edit.exam');
    Route::post('/exam/update', [ExamController::class, 'updateExam'])->name('admin.update.exam');

    // subCategory
    Route::get('/sub_category/all', [CategorySubCategoryController::class, 'allSubCategory'])->name('admin.all.subCategory');
    Route::get('/sub_category/add', [CategorySubCategoryController::class, 'addSubCategory'])->name('admin.add.subCategory');
    Route::post('/sub_category/store', [CategorySubCategoryController::class, 'storeSubCategory'])->name('admin.store.subCategory');
    Route::get('/sub_category/delete/{id}', [CategorySubCategoryController::class, 'deleteSubCategory'])->name('admin.delete.subCategory');
    Route::get('/sub_category/edit/{id}', [CategorySubCategoryController::class, 'editSubCategory'])->name('admin.edit.subCategory');
    Route::post('/sub_category/update', [CategorySubCategoryController::class, 'updateSubCategory'])->name('admin.update.subCategory');

    //student addmission
    Route::get('/admission/student', [AdmissionController::class, 'admissionApplicantList'])->name('admin.admission.student');

    //accept application
    Route::get('/accept/application/{id}', [AdmissionController::class, 'acceptAppllication'])->name('admin.accept.application');

    //Notice
    Route::get('/notice/all', [NoticeController::class, 'allNotice'])->name('admin.all.notice');
    Route::get('/notice/add', [NoticeController::class, 'addNotice'])->name('admin.add.notice');
    Route::post('/notice/store', [NoticeController::class, 'storeNotice'])->name('admin.store.notice');
    Route::get('/notice/delete/{id}', [NoticeController::class, 'deleteNotice'])->name('admin.delete.notice');
    Route::get('/notice/edit/{id}', [NoticeController::class, 'editNotice'])->name('admin.edit.notice');
    Route::post('/notice/update', [NoticeController::class, 'updateNotice'])->name('admin.update.notice');

    Route::post('/ckeditor/upload', [NoticeController::class, 'uploadCkeditor'])->name('ckeditor.upload');


    //class routine add page
    Route::get('/Class/routine',[ClassRoutineController::class,'list'])->name('admin.class.routine');
    Route::post('/Class/routine-insert',[ClassRoutineController::class,'insertclassRoutine'])->name('admin.class.routine.insert');
    Route::get('/Class/routine-view',[ClassRoutineController::class,'viewclassRoutine'])->name('admin.class.routine.view');
    Route::post('/Class/routine-delete/{clas_id}/{subject_id}',[ClassRoutineController::class,'deleteclassRoutine'])->name('admin.class.routine.delete');


    //examination routine
    Route::get('/e_xamination/routine',[ExamRoutineController::class,'create'])->name('admin.examination.routine');
    Route::post('/e_xamination/routine/store',[ExamRoutineController::class,'store'])->name('admin.exam-routine.store');
    Route::get('/e_xamination/routine/view',[ExamRoutineController::class,'view'])->name('admin.exam-routine.view');
    Route::get('/e_xamination/routine/manage',[ExamRoutineController::class,'manage'])->name('admin.examination.routine.manage');
    Route::get('/e_xamination/routine/edit/{id}/{clas_id}/{exam_id}/{session_id}',[ExamRoutineController::class,'edit'])->name('admin.examination.routine.edit');
    Route::post('/e_xamination/routine/update/{id}',[ExamRoutineController::class,'update'])->name('admin.exam-routine.update');
    Route::get('/e_xamination/routine/delete/{id}',[ExamRoutineController::class,'delete'])->name('admin.examination.routine.delete');
    Route::post('/delete',[ExamRoutineController::class,'deleteAllSelected'])->name('delete.multiple');


    //student id card
    Route::get('/_student-idcard/generate',[StudentIdcardController::class,'index'])->name('admin.student-idcard.generate');
    Route::post('/student-idcard/download',[StudentIdcardController::class,'downloadPdf'])->name('admin.student-idcard.download');


    //fees category
    Route::get('/fees/category',[FeesCollectionController::class,'categoryIndex'])->name('admin.fees.category');
    Route::get('/fees/category/add',[FeesCollectionController::class,'categoryAdd'])->name('admin.add.fee.category');
    Route::post('/fees/category/store',[FeesCollectionController::class,'categoryStore'])->name('admin.store.fee.category');
    Route::get('/fees/category/edit/{id}',[FeesCollectionController::class,'categoryEdit'])->name('admin.edit.fee.category');
    Route::post('/fees/category/update/{id}',[FeesCollectionController::class,'categoryUpdate'])->name('admin.update.fee.category');
    Route::get('/fees/category/delete/{id}',[FeesCollectionController::class,'categoryDelete'])->name('admin.delete.fee.category');

    //fees assign
    Route::get('/fees/assign',[FeesCollectionController::class,'feesAssign'])->name('admin.fees.assign');
    Route::post('/fees/assign/insert',[FeesCollectionController::class,'feesAssignInsert'])->name('admin.fees.assign.insert');

    //fees manage
    Route::get('/fees/manage',[FeesCollectionController::class,'feesManage'])->name('admin.fees.manage');
    Route::get('/fees/edit/{id}',[FeesCollectionController::class,'feesEdit'])->name('admin.fees.edit');
    Route::get('/fees/delete/{id}',[FeesCollectionController::class,'feesDelete'])->name('admin.fees.delete');
    Route::post('/fees/update/{id}',[FeesCollectionController::class,'feesUpdate'])->name('admin.fees.update');


    //fees collection
    Route::get('/fees/collection',[FeesCollectionController::class,'feesCollection'])->name('admin.fees.collection');
    Route::post('/fees/collection/store',[FeesCollectionController::class,'storeCollection'])->name('admin.collection.store');
    Route::get('/fees/total',[FeesCollectionController::class,'totalFee'])->name('admin.total.fee');
    Route::get('/fees/collection/report',[FeesCollectionController::class,'feesCollectionReport'])->name('admin.fees.collection.report');


    //student promotion
    Route::get('/_student_promotion',[StudentPromotionController::class,'index'])->name('admin.student_promotion');
    Route::post('/_student_promotion/insert',[StudentPromotionController::class,'store'])->name('admin.promotion.insert');


    //payment history
    Route::get('payment/all',[PaymentHistoryController::class,'all'])->name('admin.all.payment');
    Route::get('payment/status/complete/{id}',[PaymentHistoryController::class,'paymentStatusComplete'])->name('admin.payment.status.complete');
    Route::get('payment/status/pending/{id}',[PaymentHistoryController::class,'paymentStatusPending'])->name('admin.payment.status.pending');
    Route::get('payment/delete/{id}',[PaymentHistoryController::class,'paymentDelete'])->name('admin.delete.payment');



    //slider
    Route::get('/slider/all', [SliderController::class, 'allSlider'])->name('admin.slider.all');
    Route::get('/slider/add', [SliderController::class, 'addSlider'])->name('admin.add.slider');
    Route::post('/slider/store', [SliderController::class, 'storeSlider'])->name('admin.store.slider');
    Route::get('/slider/delete/{id}', [SliderController::class, 'deleteSlider'])->name('admin.delete.slider');
    Route::get('/slider/edit/{id}', [SliderController::class, 'editSlider'])->name('admin.edit.slider');
    Route::post('/slider/update', [SliderController::class, 'updateSlider'])->name('admin.update.slider');

    //admin profile
    Route::get('/setting/profile', [AminProfileController::class, 'adminProfile'])->name('admin.setting.profile');
    Route::post('/update/profile/{id}', [AminProfileController::class, 'adminProfileUpdate'])->name('admin.profile.update');
    Route::get('/setting/change-password', [AminProfileController::class, 'adminPasswordChange'])->name('admin.setting.change-password');
    Route::post('/update/password', [AminProfileController::class, 'adminPasswordUpdate'])->name('admin.update.password');

    Route::get('/slider/all', [SliderController::class, 'allSlider'])->name('admin.slider.all');
    Route::get('/slider/add', [SliderController::class, 'addSlider'])->name('admin.add.slider');
    Route::post('/slider/store', [SliderController::class, 'storeSlider'])->name('admin.store.slider');
    Route::get('/slider/delete/{id}', [SliderController::class, 'deleteSlider'])->name('admin.delete.slider');
    Route::get('/slider/edit/{id}', [SliderController::class, 'editSlider'])->name('admin.edit.slider');
    Route::post('/slider/update', [SliderController::class, 'updateSlider'])->name('admin.update.slider');

    //frontend setting
    Route::get('/frontend/setting/logo', [FrontendSettingController::class, 'logoSetting'])->name('admin.frontend.setting.logo');
    Route::post('/logo/update', [FrontendSettingController::class, 'logoUpdate'])->name('admin.logo.update');
    Route::get('/frontend/setting/title', [FrontendSettingController::class, 'titleSetting'])->name('admin.frontend.setting.title');
    Route::post('/title/update', [FrontendSettingController::class, 'titleUpdate'])->name('admin.title.update');
    Route::get('/frontend/setting/principal', [FrontendSettingController::class, 'principalSetting'])->name('admin.frontend.setting.principal');
    Route::get('/principal/add', [FrontendSettingController::class, 'principalAddPage'])->name('admin.add.principal');
    Route::post('/principal/store', [FrontendSettingController::class, 'principalStore'])->name('admin.store.principal');
    // Route::get('/principal/edit/{id}', [FrontendSettingController::class, 'principalEdit'])->name('admin.edit.principal');
    // Route::post('/principal/update', [FrontendSettingController::class, 'principalUpdate'])->name('admin.update.principal');
    Route::get('/principal/delete/{id}', [FrontendSettingController::class, 'principalDelete'])->name('admin.delete.principal');

});

//=========================== admin all route end=========================

/*===========================Teacher all route===========================*/
Route::get('/teacher/login', [TeacherController::class, 'teacherLoginForm']);
Route::post('/teacher-login', [TeacherController::class, 'teacherPostLogin'])->name('teacher.post.login');

Route::prefix('teacher')->middleware(['teacher'])->group(function () {
    Route::get('/dashboard', [TeacherController::class, 'teacherDashboard'])->name('teacher.dashboard');
    Route::get('/logout', [TeacherController::class, 'teacherLogout'])->name('teacher.logout');
    //student attendence from teacher
    Route::get('/attendence/student', [StudentAttendenceController::class, 'indexForTeacher'])->name('teacher.student.attendence');
    Route::post('/attendence/student/insert', [StudentAttendenceController::class, 'insertAttendenceFromTeacherPanel'])->name('teacher.attendence.student.insert');
    Route::get('/attendence/student/report', [StudentAttendenceController::class, 'studentAttendenceReportFromTeacher'])->name('teacher.student.attendence.report');
    Route::get('/attendence/student/{id}', [StudentAttendenceController::class, 'editStudentAttendenceReportFromTeacher'])->name('teacher.attendence.student.edit');
    Route::post('/attendence/student/update', [StudentAttendenceController::class, 'updateStudentAttendenceReportFromTeacher'])->name('teacher.attendence.student.update');

    //subject crud from teacher
    Route::get('/subject/all', [SubjectController::class, 'allSubjectFromTeacher'])->name('teacher.all.subject');

    Route::get('/subject/add', [SubjectController::class, 'addSubjectFromTeacher'])->name('teacher.add.subject');

    Route::post('/subject/store', [SubjectController::class, 'storeSubjectFromTeacher'])->name('teacher.store.subject');

    Route::get('/subject/delete/{id}', [SubjectController::class, 'deleteSubjectFromTeacher'])->name('teacher.delete.subject');

    Route::get('/subject/edit/{id}', [SubjectController::class, 'editSubjectFromTeacher'])->name('teacher.edit.subject');

    Route::post('/subject/update', [SubjectController::class, 'updateSubjectFromTeacher'])->name('teacher.update.subject');

    //mark assign to student from teacher
    Route::get('/mark/assign', [MarkController::class, 'indexFromTeacher'])->name('teacher.mark.assign');
    Route::post('/mark/insert', [MarkController::class, 'insertFromTeacher'])->name('teacher.mark.insert');

    //result get from teacher
    Route::get('/result/view', [MarkController::class, 'viewResultFromTeacher'])->name('teacher.result.view');
    Route::get('/result/get', [MarkController::class, 'getResultFromTeacher'])->name('teacher.get-result');
    Route::get('/result/modify', [MarkController::class, 'modifyResultFromTeacher'])->name('teacher.result.modify');
    Route::get('/result/view-modify', [MarkController::class, 'getResultForModifyFromTeacher'])->name('teacher.modify-result');
    Route::get('/result/edit/{id}', [MarkController::class, 'editResultFromTeacher'])->name('teacher.result.edit');
    Route::post('/result/update', [MarkController::class, 'updateResultFromTeacher'])->name('teacher.update.result');
    Route::get('/result/delete/{id}', [MarkController::class, 'deleteResultFromTeacher'])->name('teacher.result.delete');

    //teachr profile
    Route::get('/setting/profile', [TeacherProfileController::class, 'teacherProfile'])->name('teacher.setting.profile');
    Route::post('/update/profile/{id}', [TeacherProfileController::class, 'teacherProfileUpdate'])->name('teacher.profile.update');
    Route::get('/setting/change-password', [TeacherProfileController::class, 'teacherPasswordChange'])->name('teacher.setting.change-password');
    Route::post('/update/password', [TeacherProfileController::class, 'teacherPasswordUpdate'])->name('teacher.update.password');
});

/*===========================Teacher all route end===========================*/

/*===================student all route start ====================  */
Route::get('/student/login', [StudentAuthController::class, 'studentLoginForm'])->name('student.login');
Route::get('/student/register', [StudentAuthController::class, 'studentRegisterForm'])->name('student.register');
Route::post('/student/post-login', [StudentAuthController::class, 'studentPostLogin'])->name('student.post.login');

Route::middleware(['student'])->group(function () {
    Route::get('/student/dashboard', [StudentAuthController::class, 'studentDashboard'])->name('student.dashboard');
    Route::get('/student/logout', [StudentAuthController::class, 'studentLogout'])->name('student.logout');

    //class routine
    Route::get('student/class-routine/view',[ClassRoutineController::class,'viewclassRoutineFromStudent'])->name('student.class.routine.view');

    //exam routine
    Route::get('student/exam-routine/view',[ExamRoutineController::class,'viewFromStudent'])->name('student.exam.routine.view');

    //student profile
    Route::post('/student/profile/update/{id}',[StudentProfileController::class,'updateProfile'])->name('student.profile.update');
    Route::get('/student/passwrod/change',[StudentProfileController::class,'changePassword'])->name('student.passwrod.change');
    Route::post('/student/update/passwrod',[StudentProfileController::class,'updatePassword'])->name('student.update.password');


    //payment
    Route::get('student/payment/index',[PaymentController::class,'indexForStudent'])->name('student.payment');
    Route::post('student/payment/store',[PaymentController::class,'storePaymentFromStudent'])->name('student.payment.store');

});
/*===================student all route end====================  */

/**======================= guardian all route======================== */
Route::get('/guardian/login', [GuardianAuthController::class, 'loginForm']);
Route::post('/guardian/post-login', [GuardianAuthController::class, 'postLogin'])->name('guardian.post.login');

Route::prefix('guardian')->middleware(['guardian'])->group(function () {
    Route::get('/dashboard', [GuardianAuthController::class, 'guardianDashboard'])->name('guardian.dashboard');

    Route::get('/logout', [GuardianAuthController::class, 'logout'])->name('guardian.logout');

    //student attendence from guardian panel
    Route::get('/attendence/student/report', [StudentAttendenceController::class, 'studentAttendenceReportFromGuardian'])->name('guardian.student.attendence.report');

    //guardian profile
    Route::get('/setting/profile', [GuardianProfileController::class, 'guardianProfile'])->name('guardian.setting.profile');
    Route::post('/update/profile/{id}', [GuardianProfileController::class, 'guardianProfileUpdate'])->name('guardian.profile.update');
    Route::get('/setting/change-password', [GuardianProfileController::class, 'guardianPasswordChange'])->name('guardian.setting.change-password');
    Route::post('/update/password', [GuardianProfileController::class, 'guardianPasswordUpdate'])->name('guardian.update.password');


    //payment
    Route::get('/payment',[PaymentController::class,'index'])->name('guardian.payment');
    Route::post('/payment/store',[PaymentController::class,'storePayment'])->name('guardian.payment.store');

});

/**======================= guardian all route end======================== */

/*===========================Frontend all route================================ */
//home page
Route::get('/', [FrontHomeController::class, 'index']);

/* service container topic start */

// Route::get('/',function(){
//     //dd(app());
//     $name = app()->make('getName');
//     $name->setName('we are learning laravel ffhgj');
//     echo $name->getName(); exit();
//     return view('welcome');
// });
/* service container topic end */

//result
Route::get('/page/student/result', [FrontHomeController::class, 'result'])->name('student.result');
Route::get('/student-result/show', [FrontHomeController::class, 'getStudentResult'])->name('student.get-result');

//admission
Route::get('/page/student/admission', [FrontHomeController::class, 'studentAdmissionForm'])->name('student.admission');
Route::post('/store/admission/info', [FrontHomeController::class, 'storeAdmissionInfo'])->name('store.admission.info');


//teachers
Route::get('/page/teachers', [FrontHomeController::class, 'allTeachers'])->name('frontend.teachers');
Route::get('/page/students', [FrontHomeController::class, 'allStudents'])->name('frontend.students');

//view section
// Route::get('/view/{subCategory}', [FrontHomeController::class, 'viewSection'])->name('view.section');
 Route::get('/view_notice', [FrontHomeController::class, 'viewNotice'])->name('view.notice');
 Route::get('/view_description', [FrontHomeController::class, 'principalDescription'])->name('view.principalDescription');


 //about us
 Route::get('/about/us', [FrontHomeController::class, 'aboutUs'])->name('about.us');

 //contact us
 Route::get('/contact/us', [FrontHomeController::class, 'contactUs'])->name('contact.us');


/*===========================Frontend all route end ================================ */


