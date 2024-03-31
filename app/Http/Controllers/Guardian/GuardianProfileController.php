<?php

namespace App\Http\Controllers\Guardian;

use Image;
use App\Models\Guardian;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class GuardianProfileController extends Controller
{
    //guardian profile
    public function guardianProfile(){
        return view('guardian.profile.profile_view');
    }//end method


    //teacher profile upate
    public function guardianProfileUpdate(Request $request,$id){
        $request->validate([
            'name'=>'required',
            'phone'=>'required',
            'email'=>'required|unique:guardians,email,'.$id,
            'image'=>'image',
        ]);

        $guardian = Guardian::find($id);
        //teacher image upload
          if($request->file('image')){

            if(File::exists($guardian->image)){
                unlink($guardian->image);
            }
            $image = $request->file('image');
            $imageName = rand().'.'.$image->getClientOriginalName();
            //Image::make($image)->resize(620,620)->save('upload/guardian_images/'.$imageName);
            $request->image->move(public_path('upload/guardian_images'), $imageName);
            $image_path = 'upload/guardian_images/'.$imageName;

            $guardian->image = $image_path;
        }

        $guardian->name = $request->name;
        $guardian->phone = $request->phone;
        $guardian->email = $request->email;
        $guardian->save();
        return redirect()->back()->with('message','Profile Updated Successfully');
    }//end method


    //teacher password change
    public function guardianPasswordChange(){
        return view('guardian.profile.password_change');
    }//end method

    //teacher password updat
    public function guardianPasswordUpdate(Request $request){
        $request->validate([
            'password'=>'min:8'
        ]);
        $guardian = Guardian::find(Session::get('guardianId'));
         $guardian->password = bcrypt($request->password);
         $guardian->save();
         return redirect()->back()->with('message','Password Updated Successfully');
    }//end method
}//end main
