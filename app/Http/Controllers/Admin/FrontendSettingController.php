<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Principal;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class FrontendSettingController extends Controller
{
    //logo setting
    public function logoSetting()
    {
        return view('admin.setting.logo');
    } //end method

    //logo update
    public function logoUpdate(Request $request)
    {
        $setting = Setting::find(1);

        //logo image upload
        if ($request->file('logo')) {

            if (File::exists($setting->logo)) {
                unlink($setting->logo);
            }
            $image = $request->file('logo');
            $imageName = rand() . '.' . $image->getClientOriginalName();
            // Image::make($image)->resize(150,150)->save('upload/setting/'.$imageName);
            //return   $imageName; exit();
            $request->logo->move(public_path('upload/setting'), $imageName);
            $image_path = 'upload/setting/' . $imageName;
            $setting->logo = $image_path;
        }

        $setting->save();

        return redirect()->back()->with('message', 'Logo Updated Successfully');
    } //end method

    //title and date setting
    public function titleSetting()
    {
        $setting = Setting::find(1);
        return view('admin.setting.title_date');
    } //end method

    //title and date  update
    public function titleUpdate(Request $request)
    {
        $setting = Setting::find(1);
        $setting->title = $request->title;
        $setting->date = $request->date;
        $setting->save();
        return redirect()->back()->with('message', 'Data Updated Successfully');
    } //end method

    //principalSetting
    public function principalSetting()
    {
        $principal = Principal::orderBy('id','desc')->get();
        return view('admin.setting.principal', compact('principal'));
    }

    public function principalAddPage()
    {
        return view('admin.setting.principal_add');
    }

    //principal add
    public function principalStore(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required',
        ]);
        //image upload
        if ($request->file('image')) {
            $image = $request->file('image');
            $imageName = rand() . '.' . $image->getClientOriginalName();
            $request->image->move(public_path('upload/principal'), $imageName);
            $image_path = 'upload/principal/' . $imageName;
        }
        $principal = new Principal();
        $principal->name = $request->name;
        $principal->description = $request->description;
        $principal->image = $image_path;
        $principal->save();
        return redirect()->route('admin.frontend.setting.principal')->with('message', 'Data Added Successfully');
    }

    //principal delete
    public function principalDelete($id)
    {
        $principal = Principal::find($id);
        if (File::exists($principal->image)) {
            unlink($principal->image);
        }
        $principal->delete();
        return redirect()->route('admin.frontend.setting.principal')->with('message', 'Data Deleted Successfully');
    }
} //end method
