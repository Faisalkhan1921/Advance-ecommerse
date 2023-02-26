<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use App\Models\SubSubCategory;

class SubCategoryController extends Controller
{
    //
    public function AllSubCat()
    {
        $cat = Category::orderby('category_name_en','ASC')->get();
        $subcategory = SubCategory::latest()->get();
        return view('admin.subcat.all_subcat',compact('subcategory','cat'));
    
    }

    public function StoreSubCat(Request $request)
    {
         //validation
         $request->validate(
            [
                'category_id' => 'required',
                'subcat_name_en' => 'required',
                'subcat_name_hindi' => 'required',
            ],
            [
                'category_id.required' => 'Please select any Option',
                'subcat_name_en.required' => 'Subcategory English name is required',
                'subcat_name_hindi.required' => 'category Hindi name is required',

            ]
        );

        SubCategory::insert([
            'category_id' => $request->category_id,
            'subcat_name_en' => $request->subcat_name_en,
            'subcat_name_hindi' => $request->subcat_name_hindi,
            'subcat_slug_en' => strtolower(str_replace('','-',$request->subcat_name_en)),
            'subcat_slug_hindi' => strtolower(str_replace('','-',$request->subcat_name_hindi)),
            'created_at' => Carbon::now(),

        ]); 
        $notification = array(
        'message' => 'SubCategory Data Inserted Successfully', 
        'alert-type' => 'success'
    );

    return redirect()->back()->with($notification);
    }

    public function EditSubCat($id)
    {
        $cat = Category::orderby('category_name_en','ASC')->get();
        $subcat = SubCategory::findOrFail($id);
        return view('admin.subcat.edit_subcat',compact('subcat','cat'));
    }

    public function UpdateSubCat(Request $request,$id)
    {
      
          //validation
          $request->validate(
            [
                'category_id' => 'required',
                'subcat_name_en' => 'required',
                'subcat_name_hindi' => 'required',
            ],
            [
                'category_id.required' => 'Please select any Option',
                'subcat_name_en.required' => 'Subcategory English name is required',
                'subcat_name_hindi.required' => 'category Hindi name is required',

            ]
        );

        SubCategory::findOrFail($id)->update([
            'category_id' => $request->category_id,
            'subcat_name_en' => $request->subcat_name_en,
            'subcat_name_hindi' => $request->subcat_name_hindi,
            'subcat_slug_en' => strtolower(str_replace('','-',$request->subcat_name_en)),
            'subcat_slug_hindi' => strtolower(str_replace('','-',$request->subcat_name_hindi)),
            // 'created_at' => Carbon::now(),

        ]); 
        $notification = array(
        'message' => 'SubCategory Data Updated Successfully', 
        'alert-type' => 'info'
    );

    return redirect()->route('all.subcat')->with($notification);
    }

    public function DeleteSubCat($id)
    {
      
        SubCategory::findOrFail($id)->delete();

         $notification = array(
            'message' => 'SubCategory Deleted Successfully', 
            'alert-type' => 'warning'
        );

        return redirect()->back()->with($notification);
    }


      

}
