<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Models\SubSubCategory;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class SubSubCategoryController extends Controller
{
      //  All Sub -> SubCategory Portion Here
      public function AllSub_SubCat()
      {
          $cat = Category::orderby('category_name_en','ASC')->get();
          $sub_subcat = SubSubCategory::latest()->get();
          return view('admin.subcat.allsub_subcat',compact('sub_subcat','cat'));
      }

      public function GetSubCategory($category_id){

        $subcat = SubCategory::where('category_id',$category_id)->orderBy('subcat_name_en','ASC')->get();
        return json_encode($subcat);
    }

    public function StoreSubSubCategory(Request $request)
    {
         //validation
         $request->validate(
            [
                'category_id' => 'required',
                'subcategory_id' => 'required',
                'sub_subcategory_name_en' => 'required',
                'sub_subcategory_name_hindi' => 'required',
            ],
            [
                'category_id.required' => 'Please select any Option',
                'subcategory_id.required' => 'Please select any Option',
                'sub_subcategory_name_en.required' => 'Sub-> subcategory English name is required',
                'sub_subcategory_name_hindi.required' => 'Sub-> subcategory Hindi name is required',

            ]
        );

        SubSubCategory::insert([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'sub_subcategory_name_en' => $request->sub_subcategory_name_en,
            'sub_subcategory_name_hindi' => $request->sub_subcategory_name_hindi,
            'sub_subcategory_slug_en' => strtolower(str_replace('','-',$request->sub_subcategory_name_en)),
            'sub_subcategory_slug_hindi' => strtolower(str_replace('','-',$request->sub_subcategory_name_hindi)),
            'created_at' => Carbon::now(),

        ]); 
        $notification = array(
        'message' => 'Sub -> SubCategory Data Inserted Successfully', 
        'alert-type' => 'success'
    );

    return redirect()->back()->with($notification);
    }

    public function EditSubSubCategory($id)
    {
        $cat = Category::orderby('category_name_en','ASC')->get();
        $subcat = SubCategory::orderby('subcat_name_en','ASC')->get();
        $sub_subcat = SubSubCategory::findOrFail($id);
        return view('admin.subcat.edit_allsub_subcat',compact('sub_subcat','subcat','cat'));
    }

    public function UpdateSubSubCategory(Request $request,$id)
    {
        SubSubCategory::findOrFail($id)->update([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'sub_subcategory_name_en' => $request->sub_subcategory_name_en,
            'sub_subcategory_name_hindi' => $request->sub_subcategory_name_hindi,
            'sub_subcategory_slug_en' => strtolower(str_replace('','-',$request->sub_subcategory_name_en)),
            'sub_subcategory_slug_hindi' => strtolower(str_replace('','-',$request->sub_subcategory_name_hindi)),
            'created_at' => Carbon::now(),

        ]); 
        $notification = array(
        'message' => 'Sub -> SubCategory Data Updated Successfully', 
        'alert-type' => 'success'
    );

    return redirect()->route('all.sub_subcat')->with($notification);
    }

    public function DeleteSubSubCategory($id)
    {
        SubSubCategory::findOrFail($id)->delete();

         $notification = array(
            'message' => 'Sub -> SubCategory Deleted Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

}
