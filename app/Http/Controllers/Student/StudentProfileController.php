<?php

namespace App\Http\Controllers\Student;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class StudentProfileController extends Controller
{
    //updat student profile
    public function updateProfile(Request $request,$id){
        $request->validate([
            'name'=>'required',
            'phone'=>'required',
            'email'=>'required|unique:students,email,'.$id,
            'image'=>'image',
        ]);

        $student = Student::find($id);
        //admin image upload
          if($request->file('image')){

            if(File::exists($student->image)){
                unlink($student->image);
            }
            $image = $request->file('image');
            $imageName = rand().'.'.$image->getClientOriginalName();
            //Image::make($image)->resize(620,620)->save('upload/admin_images/'.$imageName);
            //$image->move('upload/admin_images/',$imageName);
              $request->image->move(public_path('upload/student_images'), $imageName);
            $image_path = 'upload/student_images/'.$imageName;

            $student->image = $image_path;

        }

        $student->name = $request->name;
        $student->phone = $request->phone;
        $student->email = $request->email;
        $student->save();
        return redirect()->back()->with('message','Profile Updated Successfully');
    }//end method


    //password change page
    public function changePassword(){
        return view('student.password.index');
    }//end method


    //student password update
    public function updatePassword(Request $request){
        $request->validate([
            'password'=>'required|min:8'
        ]);
        $student = Student::find(Session::get('studentId'));
         $student->password = bcrypt($request->password);
         $student->save();
         return redirect()->back()->with('message','Password Updated Successfully');
    }//end method
}//end method
