<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Clas;
use App\Models\Exam;
use App\Models\Mark;
use App\Models\Section;
use App\Models\SessionModel;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MarkController extends Controller
{
    //mark assign
    public function index(Request $request)
    {
        $classes = Clas::all();
        $class_id = $request->clas_id;
        $subject_id = $request->subject_id;
        if (!empty($request->clas_id && $request->section_id)) {
            $students = Student::where('clas_id', $class_id)->where('section_id', $request->section_id)->where('session_id',$request->session_id)->where('status',1)->get();

            // $students->appends(['clas_id' => $class_id, 'section_id' => $request->section_id,'subject_id'=>$subject_id]);
        }

        if (empty($request->section_id)) {
            $students = Student::where('clas_id', $class_id)->where('session_id',$request->session_id)->where('status',1)->get();
            // $students->appends(['clas_id' => $class_id,'subject_id'=>$subject_id]);
        }

        $sections = Section::where('clas_id', $class_id)->get();
        $section_id = $request->section_id;
        $subjects = Subject::all();
        $exams = Exam::all();
        $sessions = SessionModel::all();
        return view('admin.mark.mark_assign', compact('classes', 'class_id', 'subject_id', 'students', 'sections', 'subjects', 'section_id', 'exams', 'sessions'));
    } //end method

    //mark assign from teacher
    public function indexFromTeacher(Request $request)
    {
        $classes = Clas::all();
        $class_id = $request->clas_id;
        $subject_id = $request->subject_id;
        if (!empty($request->clas_id && $request->section_id)) {
            $students = Student::where('clas_id', $class_id)->where('section_id', $request->section_id)->where('session_id',$request->session_id)->get();

        }

        if (empty($request->section_id)) {
            $students = Student::where('clas_id', $class_id)->where('session_id',$request->session_id)->get();

        }

        $sections = Section::where('clas_id', $class_id)->get();
        $section_id = $request->section_id;
        $subjects = Subject::all();
        $exams = Exam::all();
        $sessions = SessionModel::all();
        return view('teacher.mark.mark_assign', compact('classes', 'class_id', 'subject_id', 'students', 'sections', 'subjects', 'section_id', 'exams', 'sessions'));
    } //end method

    //mark insert
    public function insert(Request $request)
    {
        $student_ids = $request->input('student_id');
        $marks = $request->input('mark');
        $class_id = $request->input('clas_id'); // Fetch the class ID
        $section_id = $request->input('section_id'); // Fetch the class ID
        $subject_id = $request->input('subject_id');
        $exam_id = $request->exam_id;
        $session_id = $request->session_id;

         // Fetch the subject to check if it's mandatory or optional
        $subject = Subject::find($subject_id);

        // Ensure $class_id is a single value, not an array

        if ($student_ids) {
            foreach ($student_ids as $key => $student_id) {
                // Check if the subject is optional and if the mark is empty
                if ($subject && $subject->type === 'optional' && empty($marks[$key])) {
                    // Skip inserting for optional subjects with no marks
                    continue;
                }

                $check = Mark::where('subject_id', $subject_id)
                ->where('clas_id', $class_id)
                ->where('section_id', $section_id)
                ->where('session_id', $session_id)
                ->where('exam_id', $exam_id )
                ->where('student_id', $student_id)
                ->first();
                if ($check) {
                    $mark = $check;
                    $mark->student_id = $student_id;
                    $mark->mark = $marks[$key];
                    $mark->clas_id = $class_id;
                    if (!empty($section_id)) {
                        $mark->section_id = $section_id;
                    }
                    $mark->subject_id = $subject_id;
                    $mark->exam_id = $exam_id;
                    $mark->session_id = $session_id;

                } else {
                    $mark = new Mark();
                    $mark->student_id = $student_id;
                    $mark->mark = $marks[$key];
                    $mark->clas_id = $class_id;
                    if (!empty($section_id)) {
                        $mark->section_id = $section_id;
                    }
                    $mark->subject_id = $subject_id;
                    $mark->exam_id = $exam_id;
                    $mark->session_id = $session_id;
                }

                $mark->save();
            }

        }

        return redirect()->back()->with('message', 'Mark assigned successfully');
    } //end method

    //mark insert from teacher
    public function insertFromTeacher(Request $request)
    {
        $student_ids = $request->input('student_id');
        $marks = $request->input('mark');
        $class_id = $request->input('clas_id'); // Fetch the class ID
        $section_id = $request->input('section_id'); // Fetch the class ID
        $subject_id = $request->input('subject_id');
        $exam_id = $request->exam_id;
        $session_id = $request->session_id;

        // Ensure $class_id is a single value, not an array

        if ($student_ids) {
            foreach ($student_ids as $key => $student_id) {
                $check = Mark::where('subject_id', $subject_id)->where('clas_id', $class_id)->where('student_id', $student_id)->first();
                if ($check) {
                    $mark = $check;
                    $mark->student_id = $student_id;
                    $mark->mark = $marks[$key];
                    $mark->clas_id = $class_id;
                    if (!empty($section_id)) {
                        $mark->section_id = $section_id;
                    }
                    $mark->subject_id = $subject_id;
                    $mark->exam_id = $exam_id;
                    $mark->session_id = $session_id;

                } else {
                    $mark = new Mark();
                    $mark->student_id = $student_id;
                    $mark->mark = $marks[$key];
                    $mark->clas_id = $class_id;
                    if (!empty($section_id)) {
                        $mark->section_id = $section_id;
                    }
                    $mark->subject_id = $subject_id;
                    $mark->exam_id = $exam_id;
                    $mark->session_id = $session_id;
                }

                $mark->save();
            }

        }

        return redirect()->back()->with('message', 'Mark assigned successfully');
    } //end method

    //result view
    public function viewResult()
    {
        $classes = Clas::all();
        $sessions = SessionModel::all();
        $exams = Exam::all();
        return view('admin.result.result_view', compact('classes', 'sessions', 'exams'));
    } //end method

    //result view from teacher
    public function viewResultFromTeacher()
    {
        $classes = Clas::all();
        $sessions = SessionModel::all();
        $exams = Exam::all();
        return view('teacher.result.result_view', compact('classes', 'sessions', 'exams'));
    } //end method

    //result get from database
    public function getResult(Request $request)
    {

        $result_date = $request->result_date;
        $student = Student::where('registration', $request->registration)->first();

        $class = Clas::where('id',$request->clas_id)->first();

        $session = SessionModel::where('id',$request->session_id)->first();

        if ($student) {
            $marks = Mark::where('student_id', $student->id)->where('clas_id', $request->clas_id)->where('session_id', $request->session_id)->where('exam_id', $request->exam_id)->get();

            $exam = Exam::where('id', $request->exam_id)->first();

            $title = 'Result';

            if (count($marks)>0) {
                return view('admin.result.result_final', compact('marks', 'student', 'exam','title','result_date','class','session'));
            } else {
                return redirect()->back()->with('sms', 'Something went wrong....Please try again');
            }
        } else {
            return redirect()->back()->with('sms', 'Something went wrong....Please try again');
        }

    } //end method

    //result by class
    public function resultByClass(){
        $classes = Clas::select('id','class_name')->get();
        $sessions = SessionModel::all();
        $exams = Exam::get();
        return view('admin.result.result_by_class', compact('classes','exams','sessions'));
    }//end method

    //fetch result by class
    public function fetchResultByClass(Request $request){
        $classWiseStudents = Student::where('clas_id',$request->clas_id)->where('session_id',$request->session_id)->get();
        $session = SessionModel::where('id',$request->session_id)->first();

        $class = Clas::where('id',$request->clas_id)->select('class_name')->first();

        $exam = Exam::where('id',$request->exam_id)->first();
        return view('admin.result.result_by_class_view', compact('classWiseStudents','exam','class','session'));
    }//end method

    //result get from teacher
    public function getResultFromTeacher(Request $request)
    {
        $student = Student::where('roll', $request->roll)->first();
        if ($student) {
            $marks = Mark::where('student_id', $student->id)->where('clas_id', $request->clas_id)->where('session_id', $request->session_id)->where('exam_id', $request->exam_id)->get();

            $exam = Exam::where('id', $request->exam_id)->first();

            if (!empty($marks)) {
                return view('teacher.result.result_final', compact('marks', 'student', 'exam'));
            } else {
                return redirect()->back()->with('sms', 'Something went wrong....Please try again');
            }
        } else {
            return redirect()->back()->with('sms', 'Something went wrong....Please try again');
        }
    } //end method

    //modify result
    public function modifyResult()
    {
        $classes = Clas::all();
        $sessions = SessionModel::all();
        $exams = Exam::all();
        return view('admin.result.result_modify', compact('classes', 'sessions', 'exams'));
    } //end method

    //modify result from teacher
    public function modifyResultFromTeacher()
    {
        $classes = Clas::all();
        $sessions = SessionModel::all();
        $exams = Exam::all();
        return view('teacher.result.result_modify', compact('classes', 'sessions', 'exams'));
    } //end method

    //get result for modify
    public function getResultForModify(Request $request)
    {
        $student = Student::where('registration', $request->registration)->first();
        $class = Clas::where('id',$request->clas_id)->first();

        $session = SessionModel::where('id',$request->session_id)->first();
        if ($student) {

            $marks = Mark::where('student_id', $student->id)->where('clas_id', $request->clas_id)->where('session_id', $request->session_id)->where('exam_id', $request->exam_id)->get();

            $exam = Exam::where('id', $request->exam_id)->first();

            if (count($marks)>0) {
                return view('admin.result.result_view_modify', compact('marks', 'student', 'exam','class','session'));
            } else {
                return redirect()->back()->with('sms', 'Something went wrong....Please try again');
            }
        } else {
            return redirect()->back()->with('sms', 'Something went wrong....Please try again');
        }
    } //end method

    //get result for modify from teacher
    public function getResultForModifyFromTeacher(Request $request)
    {
        $student = Student::where('roll', $request->roll)->first();
        if ($student) {
            $marks = Mark::where('student_id', $student->id)->where('clas_id', $request->clas_id)->where('session_id', $request->session_id)->where('exam_id', $request->exam_id)->get();

            $exam = Exam::where('id', $request->exam_id)->first();

            if (!empty($marks)) {
                return view('teacher.result.result_view_modify', compact('marks', 'student', 'exam'));
            } else {
                return redirect()->back()->with('sms', 'Something went wrong....Please try again');
            }
        } else {
            return redirect()->back()->with('sms', 'Something went wrong....Please try again');
        }
    } //end method

    //edit result
    public function editResult($id,$registration,$clas_id,$session_id,$exam_id, Request $request)
    {

        $mark = Mark::find($id);
        // Capture the previous URL
        $previousUrl = "/admin/result/view-modify?registration=$registration&clas_id=$clas_id&session_id=$session_id&exam_id=$exam_id";

        return view('admin.result.result_edit', compact('mark','previousUrl'));
    } //end method

    //edit result from teacher
    public function editResultFromTeacher($id, Request $request)
    {
        $mark = Mark::find($id);
        // Capture the previous URL
        $previousPath = $request->session()->get('previousUrl', url()->previous());

        // Store it in the session
        $request->session()->put('previousUrl', $previousPath);

        //return $previousPath;

        return view('teacher.result.result_edit', compact('mark'));
    } //end method

    //update result
    public function updateResult(Request $request)
    {
        $mark = Mark::find($request->id);
        $mark->mark = $request->mark;
        $mark->save();
        return redirect($request->previousUrl)->with('message', 'Result Updated Successfully');
    } //end method

    //update result from teacher
    public function updateResultFromTeacher(Request $request)
    {
        $mark = Mark::find($request->id);
        $mark->mark = $request->mark;
        $mark->save();
        return redirect(Session::get('previousUrl'))->with('message', 'Result Updated Successfully');
    } //end method

    //delete result
    public function deleteResult($id)
    {
        Mark::find($id)->delete();
        return redirect(Session::get('previousUrl'))->with('message', 'Data Deleted Successfully');
    } //end method

    //delete result from teacher
    public function deleteResultFromTeacher($id)
    {
        Mark::find($id)->delete();
        return redirect(Session::get('previousUrl'))->with('message', 'Data Deleted Successfully');
    } //end method
} //end class
