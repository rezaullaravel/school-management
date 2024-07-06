<?php

namespace App\Http\Controllers\Admin;

use App\Models\Fee;
use App\Models\Clas;
use App\Models\Student;
use App\Models\FeesCategory;
use App\Models\SessionModel;
use Illuminate\Http\Request;
use App\Models\FeesCollection;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class FeesCollectionController extends Controller
{
    //fees category index
    public function categoryIndex(){
        $fees_categories = FeesCategory::all();
        return view('admin.fees_collection.category_index',compact('fees_categories'));
    }//end method


    //fee category add
    public function categoryAdd(Request $request){
        return view('admin.fees_collection.category_add');
    }//end method


    //fee category store
    public function categoryStore(Request $request){
        $request->validate([
            'fees_category_name' => 'required|unique:fees_categories'
        ]);

        $fees_category = new FeesCategory();
        $fees_category->fees_category_name = $request->fees_category_name;
        $fees_category->save();

        return redirect()->back()->with('message','Fee Category Created Successfully');
    }//end method


    //fee category edit
    public function categoryEdit($id){
        $fees_category = FeesCategory::find($id);
        return view('admin.fees_collection.category_edit',compact('fees_category'));
    }//end method


    //fee category update
    public function categoryUpdate(Request $request,$id){
        $request->validate([
            'fees_category_name' => 'required|unique:fees_categories,fees_category_name,'.$id
        ]);

        $fees_category = FeesCategory::find($id);
        $fees_category->fees_category_name = $request->fees_category_name;
        $fees_category->save();

        return redirect()->route('admin.fees.category')->with('message','Fee Category Updated Successfully');
    }//end method


    //fee category delete
    public function categoryDelete($id){
        FeesCategory::find($id)->delete();
        return redirect()->back()->with('message','Fee Category Deleted Successfully');
    }//end method


    //fees assign
    public function feesAssign(Request $request){
        $fees_categories = FeesCategory::all();
        $classes = Clas::all();
        $sessions = SessionModel::all();
        return view('admin.fees_collection.fees_assign',compact('fees_categories','classes','sessions'));
    }//end method


    //fees assing insert
    public function feesAssignInsert(Request $request){
        if($request->section_id==null){
                  $check = Fee::where('clas_id', $request->clas_id)
                        ->where('session_id', $request->session_id)
                        ->where('fees_category_id',$request->fees_category_id)
                        ->first();
             } else {
                    $check = Fee::where('clas_id', $request->clas_id)
                       ->where('section_id', $request->section_id)
                       ->where('session_id', $request->session_id)
                       ->where('fees_category_id',$request->fees_category_id)
                       ->first();
        }

        if($check){
            return redirect()->back()->with('error','You have already inserted this category fee amount.');
        } else {
            $fee = new Fee();
            $fee->clas_id = $request->clas_id;

            $fee->section_id = $request->section_id;

            $fee->session_id = $request->session_id;

            $fee->fees_category_id = $request->fees_category_id;

            $fee->january = $request->january;

            $fee->february = $request->february;

            $fee->march = $request->march;

            $fee->april = $request->april;

            $fee->may = $request->may;

            $fee->june = $request->june;

            $fee->july = $request->july;

            $fee->august = $request->august;

            $fee->september = $request->september;

            $fee->october = $request->october;

            $fee->november = $request->november;

            $fee->december = $request->december;
            $fee->save();

            return redirect()->route('admin.fees.manage')->with('message','Fee Amount Inserted Successfully');
        }

    }//end method


    //fees manage
    public function feesManage(Request $request){
        if($request->clas_id){
            if($request->section_id==null){
                            $fees = Fee::where('clas_id', $request->clas_id)
                            ->where('session_id', $request->session_id)
                            ->get();
              } else {
                           $fees = Fee::where('clas_id', $request->clas_id)
                           ->where('section_id', $request->section_id)
                           ->where('session_id', $request->session_id)
                           ->get();
            }
        } else {
            $fees = Fee::all();
        }

        $classes = Clas::all();
        $sessions = SessionModel::all();
        return view('admin.fees_collection.fees_manage',compact('fees','classes','sessions'));
    }//end method


    //fees edit
    public function feesEdit($id){
        $fee = Fee::find($id);
        $classes = Clas::all();
        $sessions = SessionModel::all();
        $fees_categories = FeesCategory::all();
        return view('admin.fees_collection.fees_edit',compact('fee','classes','sessions','fees_categories'));
    }//end method


    //fees update
    public function feesUpdate(Request $request,$id){
            $fee = Fee::find($id);
            $fee->clas_id = $request->clas_id;

            $fee->section_id = $request->section_id;

            $fee->session_id = $request->session_id;

            $fee->fees_category_id = $request->fees_category_id;

            $fee->january = $request->january;

            $fee->february = $request->february;

            $fee->march = $request->march;

            $fee->april = $request->april;

            $fee->may = $request->may;

            $fee->june = $request->june;

            $fee->july = $request->july;

            $fee->august = $request->august;

            $fee->september = $request->september;

            $fee->october = $request->october;

            $fee->november = $request->november;

            $fee->december = $request->december;
            $fee->save();

            return redirect()->route('admin.fees.manage')->with('message','Fee Amount Updated Successfully');
    }//end method





    //fees delete
    public function feesDelete($id){
         Fee::find($id)->delete();
        return back()->with('message','Fee delete successfully');
    }//end method


    //fees collection
    public function feesCollection(Request $request){
        $classes = Clas::all();
        $sessions = SessionModel::all();

        return view('admin.fees_collection.collection',compact('classes','sessions'));
    }//end method





    //store collection
    public function storeCollection(Request $request){
        if($request->section_id==null){
            $student = Student::where('registration',$request->registration)->where('clas_id', $request->clas_id)
                ->where('session_id', $request->session_id)->first();
        } else {
            $student = Student::where('registration',$request->registration)->where('clas_id', $request->clas_id)->where('section_id',$request->section_id)
            ->where('session_id', $request->session_id)->first();
        }


                if($request->section_id==null){
                        $fees = Fee::where('clas_id', $request->clas_id)
                                    ->where('session_id', $request->session_id)
                                    ->get();
                } else {
                    $fees = Fee::where('clas_id', $request->clas_id)
                                   ->where('section_id', $request->section_id)
                                   ->where('session_id', $request->session_id)
                                   ->get();
                    }


                $sum_january = 0;
                $sum_february = 0;
                $sum_march = 0;
                $sum_april = 0;
                $sum_may = 0;
                $sum_june = 0;
                $sum_july = 0;
                $sum_august = 0;
                $sum_september = 0;
                $sum_october = 0;
                $sum_november = 0;
                $sum_december = 0;
                foreach($fees as $fee) {

                        $sum_january = $sum_january + $fee->january;

                        $sum_february = $sum_february + $fee->february;

                        $sum_march = $sum_march + $fee->march;

                        $sum_april = $sum_april + $fee->april;

                        $sum_may = $sum_may + $fee->may;

                        $sum_june = $sum_june + $fee->june;

                        $sum_july = $sum_july + $fee->july;

                        $sum_august = $sum_august + $fee->august;

                        $sum_september = $sum_september + $fee->september;

                        $sum_october = $sum_october + $fee->october;

                        $sum_november = $sum_november + $fee->november;

                        $sum_december = $sum_december + $fee->december;

                }






                if($student){
                $fees_collection = new FeesCollection();

                $fees_collection->registration =  $student->registration;

                $fees_collection->clas_id = $request->clas_id;

                $fees_collection->section_id = $request->section_id;

                $fees_collection->session_id = $request->session_id;

                $fees_collection->given_amount = $request->given_amount;

                if($request->month == 'january') {
                    $fees_collection->total_fee = $sum_january;
                } elseif($request->month == 'february') {
                    $fees_collection->total_fee = $sum_february;
                } elseif($request->month == 'march') {
                    $fees_collection->total_fee = $sum_march;
                } elseif($request->month == 'april') {
                    $fees_collection->total_fee = $sum_april;
                } elseif($request->month == 'may') {
                    $fees_collection->total_fee = $sum_may;
                } elseif($request->month == 'june') {
                    $fees_collection->total_fee = $sum_june;
                } elseif($request->month == 'july') {
                    $fees_collection->total_fee = $sum_july;
                } elseif($request->month == 'august') {
                    $fees_collection->total_fee = $sum_august;
                } elseif($request->month == 'september') {
                    $fees_collection->total_fee = $sum_september;
                } elseif($request->month == 'october') {
                    $fees_collection->total_fee = $sum_october;
                } elseif($request->month == 'november') {
                    $fees_collection->total_fee = $sum_november;
                } elseif($request->month == 'december') {
                    $fees_collection->total_fee = $sum_december;
                }
                $fees_collection->month = $request->month;
                $fees_collection->save();

        return redirect()->back()->with('message','Fees Collection Added Successfully');
                } else {
                    return redirect()->back()->with('error','Invalid registraion number');
                }



    }//end method


    //total fee
    public function totalFee(Request $request){
         $classes = Clas::all();
         $sessions = SessionModel::all();

         if($request->section_id==null){
                       $total_fees = Fee::where('clas_id', $request->clas_id)
                        ->where('session_id', $request->session_id)
                        ->get();
               } else {
                       $total_fees = Fee::where('clas_id', $request->clas_id)
                       ->where('section_id', $request->section_id)
                       ->where('session_id', $request->session_id)
                       ->get();
          }
        return view('admin.fees_collection.total_fee',compact('classes','sessions','total_fees'));
    }

  //fees collection report
  public function feesCollectionReport(Request $request){
         $classes = Clas::all();
         $sessions = SessionModel::all();

         if($request->section_id==null)
            {
                       $students = Student::where('clas_id', $request->clas_id)
                        ->where('session_id', $request->session_id)
                        ->where('status',1)
                        ->get();
              } else {
                       $students = Student::where('clas_id', $request->clas_id)
                       ->where('section_id', $request->section_id)
                       ->where('session_id', $request->session_id)
                       ->where('status',1)
                       ->get();
                     }
    return view('admin.fees_collection.collection_report',compact('classes','sessions','students'));
  }//end method




}//end main
