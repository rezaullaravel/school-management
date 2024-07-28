<?php

namespace App\Http\Controllers\Admin;

use App\Models\Clas;
use App\Models\Student;
use App\Models\SessionModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentPromotionController extends Controller
{
    //promotion index page
    public function index(Request $request){
        $classes = Clas::all();
        $sessions = SessionModel::all();

        if (!empty($request->clas_id && $request->section_id)) {
            $students = Student::where('clas_id', $request->clas_id)->where('section_id', $request->section_id)->where('session_id',$request->session_id)->where('status',1)->get();

        }

        if (empty($request->section_id)) {
            $students = Student::where('clas_id', $request->clas_id)->where('session_id',$request->session_id)->where('status',1)->get();
        }
        return view('admin.student_promotion.index',compact('classes','sessions','students'));
    }//end method


    //give promotion
    public function store(Request $request){
       // dd($request->all());

         // Count how many students have 'promoted' status
            $countPromoted = collect($request->promotion)
            ->where('status', 'promoted')
            ->count();

            if ($countPromoted === 0) {
                return redirect()->back()->with('error', 'No student is selected for promotion!!!');
            }

        //give promotion if the student have 'promoted' staus
        foreach($request->promotion as $promotion){
            if(isset($promotion['status']) && $promotion['status'] == 'promoted'){
                $student = Student::where('id',$promotion['student_id'])->first();
                $student->clas_id = $request->class_id;
                $student->save();
            }


        }

        return redirect()->back()->with('message','The selected student promoted successfully.');

    }//end method
}//end class
