<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    //admin login form
    public function adminLoginForm()
    {

        if (Session::get('adminId')) {
            return redirect()->route('admin.dashboard');

        } elseif (Session::get('guardianId')) {
            return redirect()->route('guardian.dashboard');
        } elseif (Session::get('teacherId')) {

        } elseif (Session::get('teacherId')) {

            return redirect()->route('teacher.dashboard');
        } elseif (Session::get('studentId')) {
            return redirect()->route('student.dashboard');
        } else {
            return view('admin.admin_login');
        }
    } //end method

    //admin post login
    public function adminPostLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $admin = Admin::where('email', $request->email)->first();
        if ($admin) {
            if (password_verify($request->password, $admin->password)) {
                $adminId = $admin->id;
                Session::put('adminId', $adminId);
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->back()->with('message', 'The given password is incorrect.');
            }
        } else {
            return redirect()->back()->with('message', 'You have no login access.');
        }
    } //end method

    //admin dahboard
    public function adminDashboard()
    {
        return view('admin.admin_dashboard');
    } //end method

    //admin logout

    // public function adminLogout(){
    //    // Session::forget('adminId');
    //    Session::flush();

    public function adminLogout()
    {
        //Session::forget('adminId');
        Session::flush();
        return redirect('/');
    } //end method

} //end method
