<?php

namespace App\Http\Controllers\Admin;

use App\Models\Clas;
use App\Models\Section;
use App\Models\Subject;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubjectController extends Controller
{
    //all subject
    public function allSubject(Request $request){
        if($request->clas_id){
            if($request->section_id==null){
                $subjects = Subject::where('clas_id',$request->clas_id)->get();
            } else {
                $subjects = Subject::where('clas_id',$request->clas_id)->where('section_id',$request->section_id)->get();
            }
        } else {
            $subjects = Subject::orderBy('id','asc')->get();
        }
        $classes = Clas::all();

        return view('admin.subject.subject_all',compact('subjects','classes'));

    }//end method


    //all subject from teacher panel
    public function allSubjectFromTeacher(){
        $subjects = Subject::orderBy('id','desc')->get();
        return view('teacher.subject.subject_all',compact('subjects'));
    }//end method


    //add subject
    public function addSubject(){
        $classes = Clas::all();
        return view('admin.subject.subject_add',compact('classes'));
    }//end method


    //add subject from teacher
    public function addSubjectFromTeacher(){
        return view('teacher.subject.subject_add');
    }//end method


    //store subject
    public function storeSubject(Request $request){

        foreach($request->subject as $sub){
            $subject = new Subject();
            $subject->clas_id = $request->clas_id;
            $subject->section_id = $request->section_id;
            $subject->subject = $sub;
            $subject->save();
        }

        return redirect()->route('admin.all.subject')->with('message','Subject Added Successfully');


    }//end method


    //store subject from teacher
    public function storeSubjectFromTeacher(Request $request){
        $request->validate([
            'subject'=>'required|unique:subjects'
        ],[
            'subject.required'=>'The subject name is required.',
        ]);

        $subject = new Subject();
        $subject->subject = $request->subject;
        $subject->save();
        return redirect()->route('teacher.all.subject')->with('message','Subject Added Successfully');
    }//end method


    //delete subject
    public function deleteSubject($id){
        Subject::find($id)->delete();
        return redirect()->route('admin.all.subject')->with('message','Subject Deleted Successfully');
    }//end method


    //delete subject from teacher
    public function deleteSubjectFromTeacher($id){
        Subject::find($id)->delete();
        return redirect()->route('teacher.all.subject')->with('message','Subject Deleted Successfully');
    }//end method


    //edit subject
    public function editSubject($id){
        $subject = Subject::find($id);
        return view('admin.subject.subject_edit',compact('subject'));
    }//end method


    //edit subject from teacher
    public function editSubjectFromTeacher($id){
        $subject = Subject::find($id);
        return view('teacher.subject.subject_edit',compact('subject'));
    }//end method


    //update subject
    public function updateSubject(Request $request){
        $request->validate([
            'subject'=>'required|unique:subjects,subject,'.$request->id,
        ],[
            'subject.required'=>'The subject name is required.',
        ]);
        $subject = Subject::find($request->id);
        $subject->subject = $request->subject;
        $subject->save();
        return redirect()->route('admin.all.subject')->with('message','Subject Updated Successfully');
    }//end method


    //update subject from teacher
    public function updateSubjectFromTeacher(Request $request){
        $request->validate([
            'subject'=>'required|unique:subjects,subject,'.$request->id,
        ],[
            'subject.required'=>'The subject name is required.',
        ]);
        $subject = Subject::find($request->id);
        $subject->subject = $request->subject;
        $subject->save();
        return redirect()->route('teacher.all.subject')->with('message','Subject Updated Successfully');
    }//end method
}//end main
