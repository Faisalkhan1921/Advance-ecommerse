@extends('admin.admin_master')
@section('content')

<div class="container-full">
  

    <!-- Main content -->
    <section class="content">
      <div class="row">
          
        <div class="col-4 mt">

            <div class="box">
               <div class="box-header with-border">
                 <h3 class="box-title">Brand Data</h3>
               </div>
               <!-- /.box-header -->
               <div class="container-fluid mt-3" >
                
                <form action="{{route('update.brand',$brand->id)}}" method="post" enctype="multipart/form-data" >
                    @csrf
                    <div class="form-group">
                        <label for="">Brand Name En</label>
                        <input type="text" name="brand_name_en" value="{{$brand->brand_name_en}}"  class="form-control">
                        @error ('brand_name_en')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Brand Name Hindi</label>
                        <input type="text" name="brand_name_hindi" value="{{$brand->brand_name_hindi}}"  class="form-control">
                        @error ('brand_name_hindi')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Brand Image</label>
                        <input type="file" name="brand_image" id="image"  class="form-control">
                        @error ('brand_image')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                    </div>
                    
                    <div class="fom-group mt-2">
                        <img id="showImage" style="width: 70px; height:50px;" class="rounded-circle" src="{{asset($brand->brand_image)}}" alt="User Avatar">
                      </div>

                    <div class="form-group mt-2">
                        
                        <input type="submit" value="Update Brand"  class="btn btn-success btn-rounded btn-outline">
                    </div>

                </form>

               </div>
             </div>
             <!-- /.box -->
   
                   
           </div>
           <!-- /.col -->


       
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  
  </div>

@endsection