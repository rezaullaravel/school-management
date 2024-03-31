<?php

namespace App\Http\Controllers\Admin;

use Image;
use App\Models\Teacher;
use App\Models\Designation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class TeacherCrudController extends Controller
{
    //all teacher list
    public function allTeacher(){
        $teachers = Teacher::all();
        return view('admin.teacher.all',compact('teachers'));
    }//end method


    //add teacher
    public function addTeacher(){
        $designations = Designation::all();
        return view('admin.teacher.add',compact('designations'));
    }//end method


    //store teacher
    public function storeTeacher(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|unique:teachers',
            'phone'=>'required',
            'password'=>'required|min:8',
            'designation_id'=>'required',
            'salary'=>'required',
            'image'=>'image',
        ],[
            'designation_id.required'=>'The designation field is required.'
        ]);

        //teacher image upload
        if($request->file('image')){
            $image = $request->file('image');
            $imageName = rand().'.'.$image->getClientOriginalName();
            //Image::make($image)->resize(620,620)->save('upload/teacher_images/'.$imageName);
             $request->image->move(public_path('upload/teacher_images'), $imageName);
            $image_path = 'upload/teacher_images/'.$imageName;
        }

        $teacher = new Teacher();
        $teacher->name = $request->name;
        $teacher->email = $request->email;
        $teacher->phone = $request->phone;
        $teacher->password = bcrypt($request->password);
        $teacher->salary = $request->salary;
        $teacher->designation_id = $request->designation_id;
        $teacher->image = $request->image ? $image_path :'';
        $teacher->save();
        return redirect()->route('admin.all.teacher')->with('message','Teacher Added Successfully');
    }//end method


    //edit teacher
    public function editTeacher($id){
        $teacher = Teacher::find($id);
        $designations = Designation::all();
        return view('admin.teacher.edit',compact('teacher','designations'));
    }//end method


    //update teacher
    public function updateTeacher(Request $request,$id){
        $teacher = Teacher::find($id);

        $request->validate([
            'name'=>'required',
            'email'=>'required|unique:teachers,email,'.$id,
            'phone'=>'required',
            'designation_id'=>'required',
            'salary'=>'required',
            'image'=>'image',
        ],[
            'designation_id.required'=>'The designation field is required.'
        ]);

          //teacher image upload
          if($request->file('image')){
            if(File::exists($teacher->image)){
                unlink($teacher->image);
            }
            $image = $request->file('image');
            $imageName = rand().'.'.$image->getClientOriginalName();
            //Image::make($image)->resize(620,620)->save('upload/teacher_images/'.$imageName);
             $request->image->move(public_path('upload/teacher_images'), $imageName);
            $image_path = 'upload/teacher_images/'.$imageName;

            $teacher->image =  $image_path;
        }

        $teacher->name = $request->name;
        $teacher->email = $request->email;
        $teacher->phone = $request->phone;
        $teacher->password = bcrypt($request->password);
        $teacher->salary = $request->salary;
        $teacher->designation_id = $request->designation_id;
        $teacher->save();
        return redirect()->route('admin.all.teacher')->with('message','Teacher Updated Successfully');

    }//end method


    //delete teacher
    public function deleteTeacher($id){
        $teacher = Teacher::find($id);
        if(File::exists($teacher->image)){
            unlink($teacher->image);
        }
        $teacher->delete();
        return redirect()->route('admin.all.teacher')->with('message','Teacher Deleted Successfully');
    }//end method
}//end method
