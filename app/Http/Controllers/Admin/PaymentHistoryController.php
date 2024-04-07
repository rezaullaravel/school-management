<?php

namespace App\Http\Controllers\Admin;

use App\Models\Payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaymentHistoryController extends Controller
{
    public function all(){
        $payments = Payment::orderBy('id','desc')->get();
        return view('admin.payment.all',compact('payments'));
    }//end method


    //make payment status complete
    public function paymentStatusComplete($id){
        $payment = Payment::find($id);
        $payment->status = 1;
        $payment->save();
        return redirect()->back()->with('message','Payment Staus Changed Successfully');
    }//end method


     //make payment status pending
     public function paymentStatusPending($id){
        $payment = Payment::find($id);
        $payment->status = 0;
        $payment->save();
        return redirect()->back()->with('message','Payment Staus Changed Successfully');
    }//end method


    //payment delete
    public function paymentDelete($id){
        Payment::find($id)->delete();
        return redirect()->back()->with('message','Payment Deleted Successfully');
    }//end method
}//end class
