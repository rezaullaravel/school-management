<?php

namespace App\Http\Controllers;

use App\Models\Notice;
use Illuminate\Http\Request;

class NoticeController extends Controller
{
    public function allNotice()
    {
        $notice = Notice::latest()->orderBy('id','desc')->get();
        return view('admin.notice.notice_all', compact('notice'));
    }
    public function addNotice()
    {
        return view('admin.notice.notice_add');
    }
    public function storeNotice(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
        $data = [
            'title' => $request->title,
            'description' => $request->description,
        ];
        $store = Notice::create($data);
        if ($store) {
            return redirect()->route('admin.all.notice')->with('message', 'Notice created successfully');
        } else {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }
    public function editNotice($id)
    {
        $notice = Notice::find($id);
        return view('admin.notice.notice_edit', compact('notice'));
    }
    public function updateNotice(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
        $data = [
            'title' => $request->title,
            'description' => $request->description,
        ];
        $update = Notice::find($request->id)->update($data);
        if ($update) {
            return redirect()->route('admin.all.notice')->with('message', 'Notice updated successfully');
        } else {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    public function deleteNotice($id)
    {
        $delete = Notice::find($id)->delete();
        if ($delete) {
            return redirect()->route('admin.all.notice')->with('message', 'Notice deleted successfully');
        } else {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    //ck editor image upload
    // public function uploadCkeditor(Request $request){
    //     if($request->hasFile('upload')){
    //         $image = $request->file('upload');
    //         $imgName = time() . '.' . $image->getClientOriginalExtension();
    //         $image->move(public_path('upload/ckeditor_images/'), $imgName);
    //         $url = url('upload/ckeditor_images/' . $imgName); // Generate the full URL

    //         return response()->json([
    //             'url' => $url, // Provide the URL to the uploaded image
    //             'uploaded' => true // Indicate successful upload
    //         ]);
    //     }
    // }//end method this code is effective only image upload

    //ck editor image upload and update
    public function uploadCkeditor(Request $request){
        // Check if there is a file in the request
        if($request->hasFile('upload')){
            // Get the old image URL from the request if available
            $oldImageUrl = $request->input('oldImage');

            // Delete the old image if it exists
            if ($oldImageUrl && file_exists(public_path($oldImageUrl))) {
                unlink(public_path($oldImageUrl));
            }

            // Upload the new image
            $image = $request->file('upload');
            $imgName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('upload/ckeditor_images/'), $imgName);
            $url = url('upload/ckeditor_images/' . $imgName); // Generate the full URL

            return response()->json([
                'url' => $url, // Provide the URL to the uploaded image
                'uploaded' => true // Indicate successful upload
            ]);
        }
    }



}//end main
