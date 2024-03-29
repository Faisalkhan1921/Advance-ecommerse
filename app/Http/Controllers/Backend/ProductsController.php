<?php

namespace App\Http\Controllers\Backend;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\SubSubCategory;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use App\Models\MultiImage;
use App\Models\SubCategory;
use Image;

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

    public function ProductStore(Request $request)
    {
        // $request->validate(
        //     [
        //         'brand_id' => 'required',
        //         'category_id' => 'required',
        //         'subcategory_id' => 'required',
        //         'subsubcategory_id' => 'required',
        //         'product_name_en' => 'required',
        //         'product_name_hin' => 'required',
        //         'product_code' => 'required',
        //         'product_qty' => 'required',
        //         'product_tags_en' => 'required',
        //         'product_tags_hin' => 'required',
        //         'product_size_en' => 'required',
        //         'product_size_hin' => 'required',
        //         'product_color_en' => 'required',
        //         'product_color_hin' => 'required',
        //         'selling_price' => 'required',
        //         'discount_price' => 'required',
        //         'product_thambnail' => 'required',
        //         'multi_img' => 'required',
        //         'short_descp_en' => 'required',
        //         'short_descp_hin' => 'required',
        //         'long_descp_en' => 'required',
        //         'long_descp_hindi' => 'required',
        //         'hot_deals' => 'required',
        //         'featured' => 'required',
        //         'special_offer' => 'required',
        //         'special_deals' => 'required',
        //     ],
            
        // );

        $image = $request->file('product_thambnail');
    	$name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    	Image::make($image)->resize(917,1000)->save('upload/products/thambnail/'.$name_gen);
    	$save_url = 'upload/products/thambnail/'.$name_gen;

        $product_id = Product::insertGetId([
      	'brand_id' => $request->brand_id,
      	'category_id' => $request->category_id,
      	'subcategory_id' => $request->subcategory_id,
      	'subsubcategory_id' => $request->subsubcategory_id,
      	'product_name_en' => $request->product_name_en,
      	'product_name_hin' => $request->product_name_hin,
      	'product_slug_en' =>  strtolower(str_replace(' ', '-', $request->product_name_en)),
      	'product_slug_hin' => str_replace(' ', '-', $request->product_name_hin),
      	'product_code' => $request->product_code,

      	'product_qty' => $request->product_qty,
      	'product_tags_en' => $request->product_tags_en,
      	'product_tags_hin' => $request->product_tags_hin,
      	'product_size_en' => $request->product_size_en,
      	'product_size_hin' => $request->product_size_hin,
      	'product_color_en' => $request->product_color_en,
      	'product_color_hin' => $request->product_color_hin,

      	'selling_price' => $request->selling_price,
      	'discount_price' => $request->discount_price,
      	'short_descp_en' => $request->short_descp_en,
      	'short_descp_hin' => $request->short_descp_hin,
      	'long_descp_en' => $request->long_descp_en,
      	'long_descp_hin' => $request->long_descp_hindi,

      	'hot_deals' => $request->hot_deals,
      	'featured' => $request->featured,
      	'special_offer' => $request->special_offer,
      	'special_deals' => $request->special_deals,

      	'product_thambnail' => $save_url,
      	'status' => 1,
      	'created_at' => Carbon::now(),  
        
      ]);

        ////////// Multiple Image Upload Start ///////////

        $images = $request->file('multi_img');
        foreach ($images as $img)
        {
            $make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(917,1000)->save('upload/products/multi_image/'.$make_name);
            $uploadPath = 'upload/products/multi_image/'.$make_name;
        
        
          MultiImage::insert([
  
              'product_id' => $product_id,
              'photo_name' => $uploadPath,
              'created_at' => Carbon::now(), 
  
          ]);
        }
        
  
        ////////// Een Multiple Image Upload Start ///////////
  
        $notification = array(
            'message' => 'Product Inserted Successfully', 
            'alert-type' => 'success'
        );
    
        return redirect()->route('manage.products')->with($notification);
  
    }


    public function ViewProducts()
    {
        $product_data = Product::latest()->get();
        return view('admin.product.product_view',compact('product_data'));
    }

    public function EditProduct($id)
    {
        $brands = Brand::latest()->get();
        $categories  = Category::latest()->get();
        $subcat = SubCategory::latest()->get();
        $sub_subcat = SubSubCategory::latest()->get();

        $product = Product::findOrFail($id);

        $multi_image = MultiImage::WHERE('product_id',$id)->get();
        return view('admin.product.edit_product',compact('brands','categories','subcat','sub_subcat','product','multi_image'));
    }

    public function UpdateProductData(Request $request, $id)
    {
         Product::findOrFail($id)->update([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_id' => $request->subsubcategory_id,
            'product_name_en' => $request->product_name_en,
            'product_name_hin' => $request->product_name_hin,
            'product_slug_en' =>  strtolower(str_replace(' ', '-', $request->product_name_en)),
            'product_slug_hin' => str_replace(' ', '-', $request->product_name_hin),
            'product_code' => $request->product_code,
  
            'product_qty' => $request->product_qty,
            'product_tags_en' => $request->product_tags_en,
            'product_tags_hin' => $request->product_tags_hin,
            'product_size_en' => $request->product_size_en,
            'product_size_hin' => $request->product_size_hin,
            'product_color_en' => $request->product_color_en,
            'product_color_hin' => $request->product_color_hin,
  
            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'short_descp_en' => $request->short_descp_en,
            'short_descp_hin' => $request->short_descp_hin,
            'long_descp_en' => $request->long_descp_en,
            'long_descp_hin' => $request->long_descp_hindi,
  
            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,
  
            'status' => 1,
            'updated_at' => Carbon::now(),  
          
        ]);
  
        $notification = array(
            'message' => 'Product Updated Successfully without Product_thumbnail and Multi_image', 
            'alert-type' => 'success'
        );
    
        return redirect()->route('manage.products')->with($notification);
    }

    public function UpdateProductMultiImg(Request $request)
    {
        //id that we pass in foreach loop multi_image fetch code
        $imgs = $request->multi_img;

		foreach ($imgs as $id => $img) {
	    $imgDel = MultiImage::findOrFail($id);
	    unlink($imgDel->photo_name);

    	$make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
    	Image::make($img)->resize(917,1000)->save('upload/products/multi_image/'.$make_name);
    	$uploadPath = 'upload/products/multi_image/'.$make_name;

    	MultiImage::where('id',$id)->update([
    		'photo_name' => $uploadPath,
    		'updated_at' => Carbon::now(),

    	]);

	 } // end foreach

       $notification = array(
			'message' => 'Product Image Updated Successfully',
			'alert-type' => 'info'
		);

		return redirect()->back()->with($notification);

    }

    public function UpdateProductThumbnail(Request $request,$id)
    {
        $data = Product::find($id);

        if ($request->file('product_thambnail')) {

        $image = $request->file('product_thambnail');
        @unlink(public_path('upload/products/thambnail/'.$data->product_thambnail));

    	$name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    	Image::make($image)->resize(917,1000)->save('upload/products/thambnail/'.$name_gen);
    	$save_url = 'upload/products/thambnail/'.$name_gen;

        }
        Product::findOrFail($id)->update([
    		'product_thambnail' => $save_url,
    		'updated_at' => Carbon::now(),

    	]);

        $notification = array(
			'message' => 'Product Thumbnail Image Updated Successfully',
			'alert-type' => 'info'
		);

		return redirect()->back()->with($notification);
    }

    public function DeleteMultiImage($id)
    {
        $delete_multi_imge = MultiImage::FindOrFail($id);
        unlink($delete_multi_imge->photo_name);
        MultiImage::findOrFail($id)->delete();

        $notification = array(
			'message' => 'Product Multi_Image Deleted Successfully',
			'alert-type' => 'info'
		);

        return redirect()->back()->with($notification);
    }

    public function ProductInactive($id)
    {
        Product::findOrFail($id)->update(['status' => 0]);

        $notification = array(
			'message' => 'Product Inactive Successfully',
			'alert-type' => 'warning'
		);

        return redirect()->back()->with($notification);
    }

    public function Productactive($id)
    {
        Product::findOrFail($id)->update(['status' => 1]);

        $notification = array(
			'message' => 'Product Active Successfully',
			'alert-type' => 'success'
		);

        return redirect()->back()->with($notification);
    }


    public function DeleteProduct($id)
    {
        $product = Product::findOrFail($id);
        unlink($product->product_thambnail);
        Product::findOrFail($id)->delete();

        $image = MultiImage::Where('product_id',$id)->get();

        foreach($image as $img)
        {
            unlink($img->photo_name);
            MultiImage::Where('product_id',$id)->delete();
        }


        $notification = array(
			'message' => 'Product Deleted Successfully',
			'alert-type' => 'success'
		);

        return redirect()->back()->with($notification);
    }
}
