<?php

namespace App\Http\Controllers;

use App\Models\Guardian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class GuardianAuthController extends Controller
{
    //guardian login form
    public function loginForm(){
       if(Session::get('guardianId')){
        return redirect()->route('guardian.dashboard');
       }
        elseif(Session::get('adminId')){
            return redirect()->route('admin.dashboard');
        } elseif(Session::get('teacherId')){
            return redirect()->route('teacher.dashboard');
        } elseif(Session::get('studentId')){
            return redirect()->route('student.dashboard');
        } else{
            return view('guardian.guardian_login');
        }
    }//end method


    //guardian post login
    public function postLogin(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $guardian = Guardian::where('email',$request->email)->first();
        if($guardian){
           if(password_verify($request->password,$guardian->password)){
             $guardianId = $guardian->id;
             Session::put('guardianId',$guardianId);
             return redirect()->route('guardian.dashboard');
           }else{
            return redirect()->back()->with('message','The given password is incorrect.');
           }
        }else{
            return redirect()->back()->with('message','You have no login access.');
        }
    }//end method


    //guardian dashboard
    public function guardianDashboard(){
        return view('admin.admin_dashboard');
    }//end method


    //guardian logout
    public function logout(){
        Session::flush();
        return redirect('/');
    }//end method
}//end main
