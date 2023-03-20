<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Image;

class SliderController extends Controller
{
    //
    public function IndexSlider()
    {
        $slider_data = Slider::latest()->get();
        return view('admin.slider.Manage_Slider',compact('slider_data'));
    }

    public function SliderStore(Request $request)
    {
        $image = $request->file('slider_img');

        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    	Image::make($image)->resize(370,370)->save('upload/slider/slider_img/'.$name_gen);
    	$save_url = 'upload/slider/slider_img/'.$name_gen;

        Slider::insert([
                'title' => $request->title,
                'description' => $request->description,
                'status' => 1,
                'slider_img' => $save_url,
        ]);


        $notification = array(
            'message' => 'Slider Data with Image Inserted Successfully', 
            'alert-type' => 'success'
        );
    
        return redirect()->back()->with($notification);

    }


    public function SliderEdit($id)
    {
        $data = slider::findOrFail($id);
        return view('admin.slider.edit_slider_view',compact('data'));
    }

    public function SliderUpdate(Request $request, $id)
    {
        //with image
        $data = Slider::findOrFail($id);
        if ($request->file('slider_img')) {
            unlink($data->slider_img);
            $image = $request->file('slider_img');
        $image = $request->file('slider_img');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    	Image::make($image)->resize(370,370)->save('upload/slider/slider_img/'.$name_gen);
    	$save_url = 'upload/slider/slider_img/'.$name_gen;

        Slider::findOrFail($id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'slider_img' => $save_url,
        ]);

        $notification = array(
            'message' => 'Slider Data with Image Update Successfully', 
            'alert-type' => 'success'
        );
    
        return redirect()->route('manage.slider')->with($notification);
        }

                // without image 
                Slider::findOrFail($id)->update([
                    'title' => $request->title,
                    'description' => $request->description,
            ]);
            $notification = array(
                'message' => 'Slider Data without Image Update Successfully', 
                'alert-type' => 'success'
            );
        
            return redirect()->route('manage.slider')->with($notification);   
    }

    public function SliderDelete(Request $request,$id)
    {
        $data = slider::findOrFail($id);

        $img = $data->slider_img;
        unlink($img);

        Slider::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Slider Deleted Successfully', 
            'alert-type' => 'success'
        );
    
        return redirect()->route('manage.slider')->with($notification);   
    }
}
