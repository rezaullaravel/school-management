<?php

namespace App\Http\Controllers\Frontend;

use Image;
use App\Models\Clas;
use App\Models\Exam;
use App\Models\Mark;
use App\Models\Notice;
use App\Models\Section;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Principal;
use App\Models\subCategory;
use App\Models\SessionModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontHomeController extends Controller
{
    //home page
    public function index()
    {
        $subCategories = SubCategory::all()->groupBy('category');

        return view('frontend.index', compact('subCategories'));
    } //end method

    //student result search page
    public function result()
    {
        $classes = Clas::all();
        $sessions = SessionModel::all();
        $exams = Exam::all();
        return view('frontend.result.result', compact('classes', 'sessions', 'exams'));
    } //end method

    //student result show page
    public function getStudentResult(Request $request)
    {
        $student = Student::where('roll', $request->roll)->first();
        if ($student) {
            $marks = Mark::where('student_id', $student->id)->where('clas_id', $request->clas_id)->where('session_id', $request->session_id)->where('exam_id', $request->exam_id)->get();

            $exam = Exam::where('id', $request->exam_id)->first();

            if (!empty($marks)) {
                return view('frontend.result.result_show', compact('marks', 'student', 'exam'));
            } else {
                return redirect()->back()->with('sms', 'Something went wrong....Please try again');
            }
        } else {
            return redirect()->back()->with('sms', 'Something went wrong....Please try again');
        }
    } //end method

    //student admission form
    public function studentAdmissionForm()
    {
        $classes = Clas::all();
        $sections = Section::all();
        $sessions = SessionModel::all();
        return view('frontend.admission.admission_form', compact('classes', 'sections', 'sessions', 'sessions'));
    } //end method

    //store student admission info
    public function storeAdmissionInfo(Request $request)
    {
        $request->validate([
            'clas_id' => 'required',
            'session_id' => 'required',
            'name' => 'required',
            'father_name' => 'required',
            'mother_name' => 'required',
            'email' => 'required|unique:students',
            'phone' => 'required|unique:students',
            'present_address' => 'required',
            'permanent_address' => 'required',
        ], [
            'clas_id.required' => 'The class field is required.',
            'session_id.required' => 'The session field is required.',
            'father_name.required' => 'The roll field is required',
            'mother_name.required' => 'The registration field is required',
        ]);

        //student image upload
        if ($request->file('image')) {
            $image = $request->file('image');
            $imageName = rand() . '.' . $image->getClientOriginalName();
            //Image::make($image)->resize(620, 620)->save('upload/student_images/' . $imageName);
            $request->image->move(public_path('upload/student_images'), $imageName);
            $image_path = 'upload/student_images/' . $imageName;
        }

        //birth certificate image upload
        if ($request->file('birth_certificate')) {
            $photo = $request->file('birth_certificate');
            $photoName = rand() . '.' . $photo->getClientOriginalName();
            //Image::make($photo)->resize(620, 620)->save('upload/student_images/' . $photoName);
            $request->birth_certificate->move(public_path('upload/student_images'), $photoName);
            $certificate_path = 'upload/student_images/' . $photoName;
        }

        $student = new Student();
        $student->clas_id = $request->clas_id;

        $student->session_id = $request->session_id;

        if ($request->section_id) {
            $student->section_id = $request->section_id;
        }
        $student->name = $request->name;
        $student->father_name = $request->father_name;
        $student->mother_name = $request->mother_name;
        $student->phone = $request->phone;
        $student->email = $request->email;
        $student->present_address = $request->present_address;
        $student->permanent_address = $request->permanent_address;
        $student->status = 0;
        $student->image = $request->image ? $image_path : '';
        $student->birth_certificate = $request->birth_certificate ? $certificate_path : '';
        $student->save();

        return redirect()->back()->with('sms', 'Your application has been submitted successfully.');
    } //end method

    public function viewSection($subCategory)
    {
        $data = subCategory::where('title', $subCategory)->first();
        $subCategories = SubCategory::all()->groupBy('category');
        if ($data) {
            return view('frontend.view_section', compact('data', 'subCategories'));
        }
        return redirect()->back()->with('message', 'No data found');
    }

    public function viewNotice()
    {
        $data = Notice::latest()->first();
        $title = 'View notice';
        // $subCategories = SubCategory::all()->groupBy('category');
        if ($data) {
            return view('frontend.view_section', compact('data','title'));
        }
        return redirect()->back()->with('message', 'No data found');

    }

    public function principalDescription()
    {
        $title = 'Headmaster message';
        $data = Principal::latest()->orderBy('id','desc')->first();
        if ($data) {
            return view('frontend.view_section', compact('data','title'));
        }
        return redirect()->back()->with('message', 'No data found');
    }


    //all teachers
    public function allTeachers(){
        $data['getRecords'] = Teacher::getRecord();
        return view('frontend.teacher.all',$data);
    }//end method


    //all students
    public function allStudents(Request $request){
        $classes = Clas::all();
        $sessions = SessionModel::all();
        $students = Student::where('clas_id',$request->clas_id)->where('session_id',$request->session_id)->get();

        return view('frontend.student.all',compact('classes','sessions','students'));
    }//end method


    //about us
    public function aboutUs(){
        return view('frontend.about.about_us');
    }//end method


    //contact us
    public function contactUs(){
        return view('frontend.contact.contact_us');
    }//end method

} //end main
