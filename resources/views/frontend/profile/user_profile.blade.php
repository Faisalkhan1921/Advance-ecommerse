@extends('frontend.user_master')
@section('content')

<div class="container mt-5">
    <div class="row">

        <div class="col-md-2 mt-5">
            <br><br>
            <img class="rounded-circle card-img-top" style="border-radius: 50%;" src="{{(!empty($userdata->profile_photo_path)) ? url('upload/user_images/' . $userdata->profile_photo_path) : url('upload/no_image.jpg')}}" alt="User Avatar" height="100%" width="100%">
            <br><br>
            <ul class="list-group list-group-flush">
                <a href="{{url('/')}}" class="btn btn-primary btn-block btn-sm">Home</a>
                <a href="{{route('user.profile')}}" class="btn btn-primary btn-block btn-sm">Profile Update</a>
                <a href="{{route('user.change.password')}}" class="btn btn-primary btn-block btn-sm">Change Password</a>
                <a href="{{route('user.logout')}}" class="btn btn-danger btn-block btn-sm">Logout</a>
            </ul>
        </div>
        {{-- end of column  --}}

        <div class="col-md-2">

        </div>
        {{-- end of column  --}}

        <div class="col-md-6">
            <div class="card">
                <h3 class="text-center"><span class="text-success">Greetings! </span><strong>{{Auth::user()->name}} </strong> Update Your Profile</h3>
            </div>

            <div class="card">
                <form action="{{route('user.profile.update')}}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label class="info-title" >Name</label>
                        <input type="text" id="name" name="name" class="form-control" value="{{$userdata->name}}">
                    </div>

                    <div class="form-group">
                        <label class="info-title" >Email Address</label>
                        <input type="email" id="email" name="email" class="form-control" value="{{$userdata->email}}">
                    </div>

                    <div class="form-group">
                        <label class="info-title" >Address</label>
                        <input type="text" id="phone" name="phone" class="form-control" value="{{$userdata->phone}}">
                    </div>
                    
                    <div class="form-group">
                        <label class="info-title" >User Image</label>
                        <input type="file" id="image" name="profile_photo_path" class="form-control">
                    </div>

                    <div class="form-group">
                        <img class="rounded-circle card-img-top" style="border-radius: 50%;" src="{{(!empty($userdata->profile_photo_path)) ? asset('upload/user_images/' . $userdata->profile_photo_path) : url('upload/no_image.jpg')}}" alt="User Avatar" height="20%" width="20%" id="showImage">
                    </div>

                    <div class="form-group">
                       <input type="submit" value="Update Profile" class="btn btn-primary form-control btn-outline">
                    </div>


                </form>
            </div>
        </div>
        {{-- end of column  --}}

    </div>
    {{-- end of the row --}}
</div>


@include('frontend.body.brands')
@endsection
