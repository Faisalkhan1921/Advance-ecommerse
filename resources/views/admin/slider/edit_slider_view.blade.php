@extends('admin.admin_master')
@section('content')

<div class="container-full">
  

    <!-- Main content -->
    <section class="content">
      <div class="row">
          
        <div class="col-12 mt">

            <div class="box">
               <div class="box-header with-border">
                 <h3 class="box-title">Update Slider Data</h3>
               </div>
               <!-- /.box-header -->
               <div class="container-fluid mt-3">
                <form action="{{route('slider.update',$data->id)}}" method="post" enctype="multipart/form-data" >
                    @csrf
                    <div class="form-group">
                        <label for="">Title</label>
                        <input type="text" name="title"  class="form-control" value="{{$data->title}}">
                        @error ('title')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Description</label>
                        <div>
                            <textarea name="description"  cols="50" rows="3" class="bg-dark text-light form-control">{{$data->title}}</textarea>
                        </div>
                        @error ('description')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Slider Image</label>
                        <input type="file" name="slider_img" id="image"  class="form-control">
                        @error ('slider_img')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                    </div>
                    
                    <div class="fom-group mt-2">
                        <img id="showImage" style="width: 120px; height:80px;" class="rounded-circle" src="{{(!empty($data->slider_img)) ? asset( $data->slider_img) : url('upload/no_image.jpg')}}" alt="User Avatar">
                      </div>

                    <div class="form-group mt-2">
                        
                        <input type="submit" value="Update Slider"  class="btn btn-success btn-rounded btn-outline">
                    </div>

                </form>
               </div>
             </div>
             <!-- /.box -->
   
                   
           </div>
           <!-- /.col -->

        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  
  </div>

@endsection