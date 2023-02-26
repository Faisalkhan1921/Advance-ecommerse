<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\SubSubCategory;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    //
    public function AddProducts()
    {
        $brands = Brand::latest()->get();
        $categories = Category::latest()->get();
        return view('admin.product.add_product',compact('brands','categories'));
    }


    public function GetSubSubCategory($subcategory_id){

        $subcat = SubSubCategory::where('subcategory_id',$subcategory_id)->orderBy('sub_subcategory_name_en','ASC')->get();
        return json_encode($subcat);
    }

}
