<?php

namespace App\Http\Controllers\Admin;

use App\Models\Clas;
use App\Models\Week;
use App\Models\Student;
use App\Models\Subject;
use App\Models\ClassRoutine;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class ClassRoutineController extends Controller
{
    //class routine add page
    public function list(Request $request){
        $classes = Clas::all();
        $subjects = Subject::all();
        $weeks = Week::all();
        $class_id = $request->class_id;
        $subject_id = $request->subject_id;
        return view('admin.class_routine.list',compact('classes','subjects','weeks','class_id','subject_id'));
    }//end method


    //insert class routine
    public function insertclassRoutine(Request $request){
        //dd($request->all()); exit();

        foreach($request->routine as $routine){

            $check = ClassRoutine::where('clas_id',$request->clas_id)->where('subject_id',$request->subject_id)->where('week_id',$routine['week_id'])->first();

            if($check){
                $save_routine = $check;
            } else{

                $save_routine = new ClassRoutine();

            }

            $save_routine->clas_id = $request->clas_id;
            $save_routine->subject_id = $request->subject_id;
            $save_routine->start_time = $routine['start_time'];
            $save_routine->end_time = $routine['end_time'];
            $save_routine->room_no = $routine['room_no'];
            $save_routine->week_id = $routine['week_id'];
            $save_routine->save();
        }

        return redirect()->back()->with('message','Class routine inserted successfully');
    }//end method


    //view class routine
    public function viewclassRoutine(Request $request){
        $classes = Clas::all();
        $weeks = Week::all();
        return view('admin.class_routine.view',compact('classes','weeks'));
    }//end method


    //view class routine from student
    public function viewclassRoutineFromStudent(Request $request){
        $id = Session::get('studentId');
        $student = Student::where('id', $id)->first();
        $class = Clas::where('id', $student->clas_id)->first();
        $weeks = Week::all();
        return view('student.class_routine.view',compact('class','weeks'));
    }//end method


    //delete class routine
    public function deleteclassRoutine($class_id,$subject_id){
        $routine = ClassRoutine::where('clas_id',$class_id)->where('subject_id',$subject_id)->get();

        if($routine->isEmpty()){
            return redirect()->back()->with('sms','Something went wrong.');
        } else{
            $routine = ClassRoutine::where('clas_id',$class_id)->where('subject_id',$subject_id)->delete();
            return redirect()->back()->with('message','This class routine deleted successfully');
        }



    }//end method
}//end main
