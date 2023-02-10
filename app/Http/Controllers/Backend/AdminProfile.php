<?php

namespace App\Http\Controllers\Backend;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminProfile extends Controller
{
    //
    public function AdminProfile()
    {
        $data = Admin::find(1);

        return view('admin.Profile.admin_profile',compact('data'));
    }

    public function ProfileEditView()
    {
        $data = Admin::find(1);
        return view('admin.Profile.profile_edit_view',compact('data'));
    }

    public function storeprofile(Request $request)
    {
       
        $data = Admin::find(1);
        $data->name = $request->name;
        $data->email = $request->email;
        

        if ($request->file('profile_photo_path')) {
            $file = $request->file('profile_photo_path');
            @unlink(public_path('upload/admin_images/'.$data->profile_photo_path));

           $filename = date('YmdHi').$file->getClientOriginalName();
           $file->move(public_path('upload/admin_images'),$filename);
           $data['profile_photo_path'] = $filename;
        }
        $data->save();

        $notification = array(
            'message' => 'Admin Profile Updated Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->route('admin.profile')->with($notification);
    }

    public function ChangePasswordViwe()
    {
        return view('admin.profile.admin_change_password');
    }

    public function UpdatePassword(Request $request){

        $validateData = $request->validate([
            'oldpassword' => 'required',
            'newpassword' => 'required',
            'confirm_password' => 'required|same:newpassword',

        ]);

        $hashedPassword = Admin::find(1)->password;
        if (Hash::check($request->oldpassword,$hashedPassword )) {
            $users = Admin::find(1);
            $users->password = bcrypt($request->newpassword);
            $users->save();

            // Auth::logout();
            $notification = array(
                'message' => 'Password Updated Successfully', 
                'alert-type' => 'success'
            );
    
            return redirect()->back()->with($notification);
        } else{
            $notification = array(
                'message' => 'Old Password is not Match', 
                'alert-type' => 'warning'
            );
    
            return redirect()->back()->with($notification);
        }

    }// End Method

}
