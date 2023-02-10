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
                <h3 class="text-center"><span class="text-success">Greetings! </span><strong>{{Auth::user()->name}} </strong> Update Your Password here</h3>
            </div>

          

            <div class="card">
                <form action="{{route('user.password.update')}}" method="post" >
                    @csrf

                    @if(count($errors))
                    @foreach ($errors->all() as $error)
                    <p class="alert alert-danger alert-dismissible"> {{ $error}} </p>
                    @endforeach
    
                @endif

                    <div class="form-group">
                        <label class="info-title" >Old Password</label>
                        <input type="password" id="oldpassword" name="oldpassword" class="form-control" >
                    </div>

                    <div class="form-group">
                        <label class="info-title" >New Password</label>
                        <input type="password" id="newpassword" name="newpassword" class="form-control"">
                    </div>

                    <div class="form-group">
                        <label class="info-title" >Confirm Password</label>
                        <input type="password" id="confirm_password" name="confirm_password" class="form-control"">
                        
                    </div>
                

                    <div class="form-group">
                       <input type="submit" value="Update Password" class="btn btn-primary form-control btn-outline">
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
