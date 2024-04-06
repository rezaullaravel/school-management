<?php

namespace App\Http\Controllers\Admin;

use App\Models\Fee;
use App\Models\Clas;
use App\Models\Student;
use App\Models\FeesCategory;
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
        return view('admin.fees_collection.fees_assign',compact('fees_categories','classes'));
    }//end method


    //fees assing insert
    public function feesAssignInsert(Request $request){
        //dd($request->all());
        foreach($request->fees as $fees){
            $check = Fee::where('class_id',$fees['class_id'])->where('fees_category_id',$request->fees_category_id)->first();
            if($check){
                $check->fees_category_id = $request->fees_category_id;
                $check->class_id = $fees['class_id'];
                $check->fees_amount = $fees['fees_amount'];
                $check->save();
            } else{
                $fee_assign = new Fee();
                $fee_assign->fees_category_id = $request->fees_category_id;
                $fee_assign->class_id = $fees['class_id'];
                $fee_assign->fees_amount = $fees['fees_amount'];
                $fee_assign->save();
            }

        }

        return redirect()->back()->with('message','Fee Amount Inserted Successfully');
    }//end method


    //fees manage
    public function feesManage(Request $request){
        $classes = Clas::all();
        $fees = Fee::where('class_id',$request->class_id)->get();
        return view('admin.fees_collection.fees_manage',compact('classes','fees'));
    }//end method


    //fees deactive
    public function feesDeactive(Request $request,$id){
        $fees = Fee::find($id);
        $fees->status=0;
        $fees->save();

       return back()->with('message','Fee deactive successfully');
    }//end method

    //fees active
    public function feesActive(Request $request,$id){
        $fees = Fee::find($id);
        $fees->status=1;
        $fees->save();
        return back()->with('message','Fee active successfully');
    }//end method


    //fees delete
    public function feesDelete($id){
         Fee::find($id)->delete();
        return back()->with('message','Fee delete successfully');
    }//end method


    //fees collection
    public function feesCollection(Request $request){
        $classes = Clas::all();
        $students = Student::where('clas_id',$request->class_id)->get();
        return view('admin.fees_collection.collection',compact('classes','students'));
    }//end method


    //fees collection add
    public function addCollection($id,$class_id,Request $request){
        $student = Student::find($id);
        $url = 'admin/fees/collection?'.'class_id='.$class_id;
        $fees_collection = DB::table('fees_collections')->where('student_id',$student->id)->where('clas_id',$student->clas_id)->where('session_id',$student->session_id)->where('month',$request->month)->get();
        return view('admin.fees_collection.collection_add',compact('student','url','fees_collection'));
    }//end method


    //fees collection insert
    public function insertCollection($student_id,$class_id,$session_id,$total){
       $url = 'admin/fees/collection/add/'.$student_id.'/'.$class_id;
       $student = Student::find($student_id);
       return view('admin.fees_collection.collection_insert',compact('student_id','class_id','session_id','total','url','student'));
    }//end method


    //store collection
    public function storeCollection(Request $request){
        $check = FeesCollection::where('student_id',$request->student_id)->where('clas_id',$request->clas_id)->where('session_id',$request->session_id)->where('month',$request->month)->latest()->first();

        if($check){


            if($request->given_amount>$check->due_amount){
                return redirect()->back()->with('sms','The given amount is larger than the due amount.');
            } else{
                $fees_collection = new FeesCollection();
                $fees_collection->student_id = $request->student_id;
                $fees_collection->clas_id = $request->clas_id;
                $fees_collection->session_id = $request->session_id;
                $fees_collection->given_amount = $request->given_amount;
                $fees_collection->due_amount = $check->due_amount-$request->given_amount;
                $fees_collection->month = $request->month;
                 $fees_collection->save();
            }


        } else{

           if($request->given_amount>$request->total_fee){
            return redirect()->back()->with('sms','The given amount is larger than the due amount.');
           } else{
            $fees_collection = new FeesCollection();
            $fees_collection->student_id = $request->student_id;
            $fees_collection->clas_id = $request->clas_id;
            $fees_collection->session_id = $request->session_id;
            $fees_collection->given_amount = $request->given_amount;
            $fees_collection->due_amount = $request->total_fee-$request->given_amount;
            $fees_collection->month = $request->month;
             $fees_collection->save();
           }

        }

        return redirect()->back()->with('message','Fees Collection Added Successfully');


    }//end method





}//end main
