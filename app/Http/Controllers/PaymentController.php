<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Student;
use App\Models\Guardian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PaymentController extends Controller
{
    public function index(Request $request){
        if(!empty($request->registration)){
            $student = Student::where('registration',$request->registration)->first();
            return view('guardian.payment.index',compact('student'));
        }
        return view('guardian.payment.index');
    }//end method


    public function indexForStudent(){
        return view('student.payment.index');
    }//end method

    //payment store
    public function storePayment(Request $request){
        $request->validate([
            'transaction_id' => 'required|unique:payments',
        ]);

        //sender info
        $id = Session::get('guardianId');
        $sender = Guardian::find($id);

        $payment = new Payment();
        $payment->transaction_id = $request->transaction_id;
        $payment->sender_name = $sender->name;
        $payment->sender_phone = $sender->phone;
        $payment->sender_email = $sender->email;
        $payment->sender_type = 'Guardian';
        $payment->student_reg = $request->registration;
        $payment->save();
        return redirect()->back()->with('message','Payment has been successfully submitted');
    }//end method


    //payment store from student panel
    public function storePaymentFromStudent(Request $request){
        $request->validate([
            'transaction_id' => 'required|unique:payments',
        ]);

        //sender info
        $id = Session::get('studentId');
        $sender = Student::find($id);

        $payment = new Payment();
        $payment->transaction_id = $request->transaction_id;
        $payment->sender_name = $sender->name;
        $payment->sender_phone = $sender->phone;
        $payment->sender_email = $sender->email;
        $payment->sender_type = 'Student';
        $payment->student_reg = $sender->registration;
        $payment->save();
        return redirect()->back()->with('message','Payment has been successfully submitted');
    }//end method
}//end main
