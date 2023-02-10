@extends('admin.admin_master')
@section('content')
	<div class="container-full">  

		<!-- Main content -->
		<div class="container mt-5">
            <div class="row">
                <div class="col-md-12">
                            <h1>EDIT PROFILE VIEW</h1>
                            <div class="row">
                                <div class="col-12">
                        <form action="{{route('store.profile_image')}}" method="POST"  enctype="multipart/form-data">
                            @csrf 
                
                                  <div class="fom-group">
                                    <label for="">Admin Name</label>
                                    <input name="name" type="text" class="bg-dark text-light form-control" value="{{$data->name}}">
                                  </div>
                                
                                
                                  <div class="fom-group">
                                    <label for="">Email</label>
                                    <input name="email" type="email" class="bg-dark text-light form-control" value="{{$data->email}}">
                                  </div>

                                  <div class="fom-group">
                                    <label for="">Profile Image</label>
                                    <input name="profile_photo_path" type="file" class="bg-dark text-light form-control" id="image">
                                  </div>

                                  <div class="fom-group mt-2">
                                    <img id="showImage" style="width: 120px; height:80px;" class="rounded-circle" src="{{(!empty($data->profile_photo_path)) ? url('upload/admin_images/' . $data->profile_photo_path) : url('upload/no_image.jpg')}}" alt="User Avatar">
                                  </div>

                                  <div class="fom-group mt-2">
                                    <input type="submit" value="Update Profile" class="btn btn-success btn-rounded btn-outline">
                                  </div>
                        </form>
                                </div>

                                    <!-- /.input group -->
                                </div>
                            </div>
                          
                    </form>
                </div>
            </div>
        </div>
		<!-- /.content -->
  </div>
@endsection