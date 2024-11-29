<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\subCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class CategorySubCategoryController extends Controller
{
    public function allSubCategory()
    {
        $data = subCategory::all();
        return view('admin.subCategory.subCategory_all', compact('data'));
    }

    public function addSubCategory()
    {
        return view('admin.subCategory.subCategory_add');
    }

    public function storeSubCategory(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:sub_categories',
            'category' => 'required',
            'image' => 'required',
            'description' => 'required',
        ]);
        if ($request->file('image')) {
            $image = $request->file('image');
            $imageName = rand() . '.' . $image->getClientOriginalName();
            // Image::make($image)->resize(450, 450)->save('upload/subCategory_images/' . $imageName);
            $image->move(public_path('upload/subCategory_images'), $imageName);
            $image_path = 'upload/subCategory_images/' . $imageName;
        }

        subCategory::create([
            'title' => $request->title,
            'category' => $request->category,
            'image' => $image_path,
            'description' => $request->description,
        ]);
        return redirect()->route('admin.all.subCategory')->with('message', 'Sub Category Added Successfully');
    }

    public function editSubCategory($id)
    {
        $data = subCategory::find($id);
        return view('admin.subCategory.subCategory_edit', compact('data'));
    }

    public function updateSubCategory(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'description' => 'required',
        ]);
        if ($request->file('image')) {
            $request->validate([
                'image' => 'required',
            ]);
        }
        $subCategory = subCategory::find($request->id);

        if ($request->file('image')) {
            if (File::exists($subCategory->image)) {
                unlink($subCategory->image);
            }
            $image = $request->file('image');
            $imageName = rand() . '.' . $image->getClientOriginalName();
            //Image::make($image)->resize(450, 450)->save('upload/subCategory_images/' . $imageName);
            $image->move(public_path('/upload/subCategory_images'), $imageName);
            $image_path = 'upload/subCategory_images/' . $imageName;

            subCategory::find($request->id)->update([
                'image' => $image_path,
            ]);
        }
        subCategory::find($request->id)->update([
            'title' => $request->title,
            'category' => $request->category,
            'description' => $request->description,
        ]);
        return redirect()->route('admin.all.subCategory')->with('message', 'Sub Category Updated Successfully');
    }

    public function deleteSubCategory($id)
    {
        $subCategory = subCategory::find($id);
        if (File::exists($subCategory->image)) {
            unlink($subCategory->image);
        }
        $subCategory->delete();
        return redirect()->route('admin.all.subCategory')->with('message', 'Sub Category Deleted Successfully');
    }
}
