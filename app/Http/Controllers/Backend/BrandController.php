<?php

namespace App\Http\Controllers\Backend;

use App\Models\Brand;
use Illuminate\Http\Request;
// use Intervention\Image\Image;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Image;
class BrandController extends Controller
{
    //
    public function AllBrands()
    {
        $brand = Brand::latest()->get();
        return view('admin.brands.all_brands',compact('brand'));   
    }

    public function StoreBrand(Request $request)
    {
          //validation
          $request->validate(
            [
                'brand_name_en' => 'required',
                'brand_name_hindi' => 'required',
                'brand_image' => 'required',
            ],
            [
                'brand_name_en.required' => 'Brand English name is required',
                'brand_name_hindi.required' => 'Brand hindi name is required',
            ]
        );

        $image = $request->file('brand_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();  // 3434343443.jpg

        Image::make($image)->resize(300,300)->save('upload/brands/'.$name_gen);
        $save_url = 'upload/brands/'.$name_gen;

        Brand::insert([
            'brand_name_en' => $request->brand_name_en,
            'brand_name_hindi' => $request->brand_name_hindi,
            'brand_slud_en' => strtolower(str_replace('','-',$request->brand_name_en)),
            'brand_slud_hindi' => strtolower(str_replace('','-',$request->brand_name_hindi)),
            'brand_image' => $save_url,
            'created_at' => Carbon::now(),

        ]); 
        $notification = array(
        'message' => 'Brand Data Inserted Successfully', 
        'alert-type' => 'success'
    );

    return redirect()->back()->with($notification);

    }

    public function EditBrand($id)
    {
        $brand = Brand::findOrFail($id);
        return view('admin.brands.brand_edit',compact('brand'));
    }
    public function UpdateBrand(Request $request,$id)
    {
        $brand = Brand::findOrFail($id);
        if ($request->file('brand_image')) {
            $image = $request->file('brand_image');
            @unlink(public_path('upload/brands/'.$brand->brand_image));
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();  // 3434343443.jpg

            Image::make($image)->resize(300,300)->save('upload/brands/'.$name_gen);
            $save_url = 'upload/brands/'.$name_gen;

            Brand::findOrFail($id)->update([
                'brand_name_en' => $request->brand_name_en,
                'brand_name_hindi' => $request->brand_name_hindi,
                'brand_image' => $save_url,

            ]); 
            $notification = array(
            'message' => 'Brand Updated with Image Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->route('all.brands')->with($notification);

        } else{

            Brand::findOrFail($id)->update([
                'brand_name_en' => $request->brand_name_en,
                'brand_name_hindi' => $request->brand_name_hindi,
            ]); 
            $notification = array(
            'message' => 'Brand Updated without Image Successfully', 
            'alert-type' => 'success'
        );

       return redirect()->route('all.brands')->with($notification);

        } // end Else

    }

    public function DeleteBrand($id)
    {
        $brand = Brand::findOrFail($id);

        if($brand->brand_image)
        {
        $img = $brand->brand_image;
        unlink($img);
        }
       

        Brand::findOrFail($id)->delete();

         $notification = array(
            'message' => 'Brand Deleted Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);   
    }
}
