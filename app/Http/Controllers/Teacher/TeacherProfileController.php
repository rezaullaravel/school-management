<?php

namespace App\Http\Controllers\Teacher;

use Image;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class TeacherProfileController extends Controller
{
    //teacher profile
    public function teacherProfile(){
        return view('teacher.profile.profile_view');
    }//end method


    //teacher profile upate
    public function teacherProfileUpdate(Request $request,$id){
        $request->validate([
            'name'=>'required',
            'phone'=>'required',
            'email'=>'required|unique:teachers,email,'.$id,
            'image'=>'image',
        ]);

        $teacher = Teacher::find($id);
        //teacher image upload
          if($request->file('image')){

            if(File::exists($teacher->image)){
                unlink($teacher->image);
            }
            $image = $request->file('image');
            $imageName = rand().'.'.$image->getClientOriginalName();
            //Image::make($image)->resize(620,620)->save('upload/teacher_images/'.$imageName);
            //return $image; exit();
           // $image->move('upload/teacher_images/',$imageName);
            $request->image->move(public_path('upload/teacher_images'), $imageName);
            $image_path = 'upload/teacher_images/'.$imageName;

            $teacher->image = $image_path;
        }

        $teacher->name = $request->name;
        $teacher->phone = $request->phone;
        $teacher->email = $request->email;
        $teacher->save();
        return redirect()->back()->with('message','Profile Updated Successfully');
    }//end method


    //teacher password change
    public function teacherPasswordChange(){
        return view('teacher.profile.password_change');
    }//end method

    //teacher password updat
    public function teacherPasswordUpdate(Request $request){
        $request->validate([
            'password'=>'min:8'
        ]);
        $teacher = Teacher::find(Session::get('teacherId'));
         $teacher->password = bcrypt($request->password);
         $teacher->save();
         return redirect()->back()->with('message','Password Updated Successfully');
    }//end method
}//end method
