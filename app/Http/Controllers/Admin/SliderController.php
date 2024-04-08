<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Image;

class SliderController extends Controller
{
    //all slider list
    public function allSlider()
    {
        $sliders = Slider::all();
        return view('admin.slider.slider_all', compact('sliders'));
    } //end method

    //add slider
    public function addSlider()
    {
        return view('admin.slider.slider_add');
    } //end method

    //insert slider
    public function storeSlider(Request $request)
    {
        $request->validate([
            'image' => 'required|image',
        ]);

        //slider image upload
        if ($request->file('image')) {
            $image = $request->file('image');
            $imageName = rand() . '.' . $image->getClientOriginalName();
            Image::make($image)->resize(1680,900)->save('upload/slider_images/' . $imageName);
            //  $request->image->move(public_path('upload/slider_images'), $imageName);
            $image_path = 'upload/slider_images/'.$imageName;
        }

        $slider = new Slider();
        $slider->image = $image_path;
        $slider->save();
        return redirect()->route('admin.slider.all')->with('message', 'Slider added successfully');
    } //end method

    //slider delete
    public function deleteSlider($id)
    {
        $slider = Slider::find($id);
        if (File::exists($slider->image)) {
            unlink($slider->image);
        }
        $slider->delete();
        return redirect()->route('admin.slider.all')->with('message', 'Slider deleted successfully');
    } //end method

    //slider edit
    public function editSlider($id)
    {
        $slider = Slider::find($id);
        return view('admin.slider.slider_edit', compact('slider'));
    } //end method

    //update slider
    public function updateSlider(Request $request)
    {
        $request->validate([
            'image' => 'image',
        ]);

        $slider = Slider::find($request->id);

        //slider image upload
        if ($request->file('image')) {

            if (File::exists($slider->image)) {
                unlink($slider->image);
            }
            $image = $request->file('image');
            $imageName = rand() . '.' . $image->getClientOriginalName();
            Image::make($image)->resize(1680,900)->save('upload/slider_images/' . $imageName);
           // $request->image->move(public_path('upload/slider_images'), $imageName);
            $image_path = 'upload/slider_images/'.$imageName;
            $slider->image = $image_path;
            $slider->save();
        }

        return redirect()->route('admin.slider.all')->with('message', 'Slider updated successfully');
    } //end method
} //end class
