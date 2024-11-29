<?php

namespace App\Http\Controllers\Admin;

use PDF;
use App\Models\Clas;
use App\Models\Student;
use App\Models\SessionModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentIdcardController extends Controller
{
    public function index(){
        $classes = Clas::all();
        $sessions = SessionModel::all();
        return view('admin.student_id_card.index',compact('classes','sessions'));
    }//end method


    //download stuent id card
    public function downloadPdf(Request $request){
          $data = Student::where('clas_id',$request->clas_id)->where('session_id',$request->session_id)->get();


       $mpdf = new \Mpdf\Mpdf();

       $mpdf->WriteHTML($this->pdfHtml($data));

       $mpdf->Output();
    }//end method

    public function pdfHtml($data){
        
        return view('admin.student_id_card.pdf_file',compact('data'));
    }
}//end class
