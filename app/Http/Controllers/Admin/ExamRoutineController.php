<?php

namespace App\Http\Controllers\Admin;

use App\Models\Clas;
use App\Models\Exam;
use App\Models\Student;
use App\Models\Subject;
use App\Models\ExamRoutine;
use App\Models\SessionModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class ExamRoutineController extends Controller
{
    //examination routine create page
    public function create(){
        $classes = Clas::all();
        $subjects = Subject::all();
        $exams = Exam::all();
        $sessions = SessionModel::all();
        return view('admin.exam_routine.create',compact('classes','subjects','exams','sessions'));
    }//end method


    //exam routine store
    public function store(Request $request){
        $request->validate([
            'clas_id' => 'required',
            'subject_id' => 'required',
            'exam_id' => 'required',
            'session_id' => 'required',
            'room_no' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'date' => 'required',
        ],[
           'clas_id.required' => 'The class  field is required.',
           'subject_id.required' => 'The subject  field is required.',
           'exam_id.required' => 'The exam  field is required.',
           'session_id.required' => 'The sesion  field is required.',
           'room_no.required' => 'The room  field is required.',
           'start_time.required' => 'The start time  field is required.',
           'end_time.required' => 'The end time  field is required.',
           'date.required' => 'The date  field is required.',
        ]);

        //data insert
        $check = ExamRoutine::where('clas_id',$request->clas_id)->where('subject_id',$request->subject_id)->where('exam_id',$request->exam_id)->where('session_id',$request->session_id)->first();

        if($check){
            return redirect()->back()->with('sms','This routine is already exists.');
        } else{
            $routine = new ExamRoutine();

            $routine->clas_id = $request->clas_id;

            $routine->subject_id = $request->subject_id;

            $routine->exam_id = $request->exam_id;

            $routine->session_id = $request->session_id;

            $routine->room_no = $request->room_no;

            $routine->start_time = $request->start_time;

            $routine->end_time = $request->end_time;

            $routine->date = date('Y-m-d h:i:s',strtotime($request->date));

            $routine->save();

            return redirect()->back()->with('message','Exam routine created successfully');
        }
    }//end method


    //exam routine view
    public function view(Request $request){
        $classes = Clas::all();
        $subjects = Subject::all();
        $exams = Exam::all();
        $sessions = SessionModel::all();

        $routines = ExamRoutine::where('clas_id',$request->clas_id)->where('exam_id',$request->exam_id)->where('session_id',$request->session_id)->get();
        return view('admin.exam_routine.view',compact('classes','subjects','exams','sessions','routines'));
    }//end method


    //exam routine view from student
    public function viewFromStudent(Request $request){
        $id = Session::get('studentId');
        $student = Student::where('id', $id)->first();
        $class = Clas::where('id', $student->clas_id)->first();
        $exams = Exam::all();
        $session = SessionModel::where('id',$student->session_id)->first();
        $routines = ExamRoutine::where('clas_id',$request->clas_id)->where('exam_id',$request->exam_id)->where('session_id',$request->session_id)->get();
        return view('student.exam_routine.view',compact('class','exams','session','routines','routines'));
    }


    //exam routine manage
    public function manage(Request $request){
        $classes = Clas::all();
        $subjects = Subject::all();
        $exams = Exam::all();
        $sessions = SessionModel::all();

        $routines = ExamRoutine::where('clas_id',$request->clas_id)->where('exam_id',$request->exam_id)->where('session_id',$request->session_id)->get();
        return view('admin.exam_routine.manage',compact('classes','subjects','exams','sessions','routines'));
    }//end method


    //exam routine edit
    public function edit($id,$clas_id,$exam_id,$session_id){

        $routine = ExamRoutine::find($id);

        $classes = Clas::all();
        $subjects = Subject::all();
        $exams = Exam::all();
        $sessions = SessionModel::all();

        $url = 'admin/e_xamination/routine/manage?'.'clas_id='.$clas_id.'&exam_id='.$exam_id.'&session_id='.$session_id;

        return view('admin.exam_routine.edit',compact('routine','classes','subjects','exams','sessions','url'));
    }//end method


    //exam routine update
    public function update(Request $request,$id){
        $request->validate([
            'clas_id' => 'required',
            'subject_id' => 'required',
            'exam_id' => 'required',
            'session_id' => 'required',
            'room_no' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'date' => 'required',
        ],[
           'clas_id.required' => 'The class  field is required.',
           'subject_id.required' => 'The subject  field is required.',
           'exam_id.required' => 'The exam  field is required.',
           'session_id.required' => 'The sesion  field is required.',
           'room_no.required' => 'The room  field is required.',
           'start_time.required' => 'The start time  field is required.',
           'end_time.required' => 'The end time  field is required.',
           'date.required' => 'The date  field is required.',
        ]);

        $url = $request->url;
        $routine = ExamRoutine::find($id);
        $routine->clas_id = $request->clas_id;

        $routine->subject_id = $request->subject_id;

        $routine->exam_id = $request->exam_id;

        $routine->session_id = $request->session_id;

        $routine->room_no = $request->room_no;

        $routine->start_time = $request->start_time;

        $routine->end_time = $request->end_time;

        $routine->date = date('Y-m-d h:i:s',strtotime($request->date));

        $routine->save();

        return redirect($url)->with('message','Exam routine updated successfully');
    }//end method


    //exam routine delete
    public function delete($id){
         ExamRoutine::find($id)->delete();
         return redirect()->back()->with('message','Exam routine deleted successfully');
    }//end method


    //delete all selected routine
    public function deleteAllSelected(Request $request){
        $ids = $request->ids;
        foreach($ids as $id){
            ExamRoutine::where('id',$id)->delete();
        }

        return response()->json([
            'status'=>'Successfully deleted.',
        ]);
    }//end method
}//end main



