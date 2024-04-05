<?php

namespace App\Http\Controllers\Admin;

use App\Models\Fee;
use App\Models\Clas;
use App\Models\FeesCategory;
use Illuminate\Http\Request;
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
    public function feesCollection(){
        $classes = Clas::all();
        return view('admin.fees_collection.collection',compact('classes'));
    }//end method





}//end main
