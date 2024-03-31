<?php

namespace App\Http\Controllers;

use App\Models\Notice;
use Illuminate\Http\Request;

class NoticeController extends Controller
{
    public function allNotice()
    {
        $notice = Notice::all();
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
}
