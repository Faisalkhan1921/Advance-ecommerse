<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
// use App\Http\Controllers\Backend\CategoryController;
use PhpParser\Node\Expr\FuncCall;

class CategoryController extends Controller
{
    //
    public function AllCategory()
    {
        $cat_data = Category::latest()->get();
        return view('admin.category.all_category',compact('cat_data'));
    }

    public function StoreCategory(Request $request)
    {
          //validation
          $request->validate(
            [
                'category_name_en' => 'required',
                'category_name_hindi' => 'required',
                'category_icon' => 'required',
            ],
            [
                'category_name_en.required' => 'category English name is required',
                'category_name_hindi.required' => 'category hindi name is required',
                'category_icon.required' => 'category Icon is required',

            ]
        );

      
        Category::insert([
            'category_name_en' => $request->category_name_en,
            'category_name_hindi' => $request->category_name_hindi,
            'category_slug_en' => strtolower(str_replace('','-',$request->category_name_en)),
            'category_slug_hindi' => strtolower(str_replace('','-',$request->category_name_hindi)),
            'category_icon' => $request->category_icon,
            'created_at' => Carbon::now(),

        ]); 
        $notification = array(
        'message' => 'Category Data Inserted Successfully', 
        'alert-type' => 'success'
    );

    return redirect()->back()->with($notification);
    }


    public function EditCategory($id)
    {   
        $data = Category::findOrFail($id);
        return view('admin.category.edit_category',compact('data'));
    }

    public function UpdateCategory(Request $request, $id)
    {
        Category::findOrFail($id)->update([
            'category_name_en' => $request->category_name_en,
            'category_name_hindi' => $request->category_name_hindi,
            'category_icon' => $request->category_icon,
        ]); 
        $notification = array(
        'message' => 'Category Icon Updated Successfully', 
        'alert-type' => 'success'
    );

   return redirect()->route('all.category')->with($notification);

    }
    
    public function DeleteCategory($id)
    {
        $cat_data = Category::findOrFail($id);

      
        Category::findOrFail($id)->delete();

         $notification = array(
            'message' => 'Category Deleted Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
