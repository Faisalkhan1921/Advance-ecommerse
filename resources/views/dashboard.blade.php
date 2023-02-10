@php 
$id = Auth::user()->id;
$data = App\Models\User::find($id);
@endphp


@extends('frontend.user_master')
@section('content')

<div class="container mt-5">
    <div class="row">

        <div class="col-md-2 mt-5">
            <br><br>
            <img class="rounded-circle card-img-top" style="border-radius: 50%;" src="{{(!empty($data->profile_photo_path)) ? url('upload/user_images/' . $data->profile_photo_path) : url('upload/no_image.jpg')}}" alt="User Avatar" height="100%" width="100%">
            <br><br>
            <ul class="list-group list-group-flush">
                <a href="{{url('/')}}" class="btn btn-primary btn-block btn-sm">Home</a>
                <a href="{{route('user.profile')}}" class="btn btn-primary btn-block btn-sm">Profile Update</a>
                <a href="" class="btn btn-primary btn-block btn-sm">Change Password</a>
                <a href="{{route('user.logout')}}" class="btn btn-danger btn-block btn-sm">Logout</a>
            </ul>
        </div>
        {{-- end of column  --}}

        <div class="col-md-2">

        </div>
        {{-- end of column  --}}

        <div class="col-md-8">
            <div class="card">
                <h3 class="text-center"><span class="text-success">Greetings! </span><strong>{{Auth::user()->name}} </strong> Welcome to Easy Online Shop</h3>
            </div>
        </div>
        {{-- end of column  --}}

    </div>
    {{-- end of the row --}}
</div>


@include('frontend.body.brands')
@endsection
