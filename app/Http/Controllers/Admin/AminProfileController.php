<?php

namespace App\Http\Controllers\Admin;

use Image;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class AminProfileController extends Controller
{
    //admin profile
    public function adminProfile(){
        return view('admin.profile.profile_view');
    }//end method


    //admin profile update
    public function adminProfileUpdate(Request $request,$id){
        $request->validate([
            'name'=>'required',
            'phone'=>'required',
            'email'=>'required|unique:admins,email,'.$id,
            'image'=>'image',
        ]);

        $admin = Admin::find($id);
        //admin image upload
          if($request->file('image')){

            if(File::exists($admin->image)){
                unlink($admin->image);
            }
            $image = $request->file('image');
            $imageName = rand().'.'.$image->getClientOriginalName();
            //Image::make($image)->resize(620,620)->save('upload/admin_images/'.$imageName);
            //$image->move('upload/admin_images/',$imageName);
              $request->image->move(public_path('upload/admin_images'), $imageName);
            $image_path = 'upload/admin_images/'.$imageName;

            $admin->image = $image_path;
            
        }

        $admin->name = $request->name;
        $admin->phone = $request->phone;
        $admin->email = $request->email;
        $admin->save();
        return redirect()->back()->with('message','Profile Updated Successfully');
    }//end method


    //admin password change
    public function adminPasswordChange(){
        return view('admin.profile.password_change');
    }//end method


    //admin password update
    public function adminPasswordUpdate(Request $request){
        $request->validate([
            'password'=>'required|min:8'
        ]);
        $admin = Admin::find(Session::get('adminId'));
         $admin->password = bcrypt($request->password);
         $admin->save();
         return redirect()->back()->with('message','Password Updated Successfully');
    }//end method
}//end method
