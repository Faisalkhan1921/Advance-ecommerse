<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    //
    public function index()
    {
        if(Auth::id())
        {
            return view('frontend.index');
        }
        else
        {
            return redirect()->route('login');
        }
    }

    public function UserLogout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function UserProfile()
    {
        if(Auth::id())
        {
            $id = Auth::user()->id;
            $userdata = User::find($id);
            return view('frontend.profile.user_profile',compact('userdata'));
        }
        else
        {
            return redirect()->route('login');
        }
    }

    public function UpdateProfile(Request $request)
    {
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;

        

        if ($request->file('profile_photo_path')) {
            $file = $request->file('profile_photo_path');
            @unlink(public_path('upload/user_images/'.$data->profile_photo_path));

           $filename = date('YmdHi').$file->getClientOriginalName();
           $file->move(public_path('upload/user_images'),$filename);
           $data['profile_photo_path'] = $filename;
        }
        $data->save();

        $notification = array(
            'message' => 'User Profile Updated Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->route('user.profile')->with($notification);
    }

    public function ChangePassword()
    {
        if(Auth::id())
        {
            $id = Auth::user()->id;
            $userdata = User::find($id);
            return view('frontend.profile.change_password',compact('userdata'));
        }
        else
        {
            return redirect()->route('login');
        }
    }

    public function PasswordUpdate(Request $request)
    {
        $validateData = $request->validate([
            'oldpassword' => 'required',
            'newpassword' => 'required',
            'confirm_password' => 'required|same:newpassword',

        ]);

        

        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->oldpassword,$hashedPassword )) {
            $users = User::find(Auth::id());
            $users->password = bcrypt($request->newpassword);
            $users->save();

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


    }
}
