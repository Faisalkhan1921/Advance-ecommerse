@extends('admin.admin_master')
@section('content')

<div class="container-full">
  

    <!-- Main content -->
    <section class="content">
      <div class="row">
          
        <div class="col-3 mt">

            <div class="box">
               <div class="box-header with-border">
                 <h3 class="box-title">Brand Data</h3>
               </div>
               <!-- /.box-header -->
               <div class="container-fluid mt-3">
                <form action="{{route('store.brand.data')}}" method="post" enctype="multipart/form-data" >
                    @csrf
                    <div class="form-group">
                        <label for="">Brand Name En</label>
                        <input type="text" name="brand_name_en"  class="form-control">
                        @error ('brand_name_en')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Brand Name Hindi</label>
                        <input type="text" name="brand_name_hindi"  class="form-control">
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
                        <img id="showImage" style="width: 70px; height:50px;" class="rounded-circle" src="{{(url('upload/no_image.jpg'))}}" alt="User Avatar">
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


        <div class="col-9">

         <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Brand Data</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Sno</th>
                            <th>Brand Name English</th>
                            <th>Brand Name Hindi</th>
                            <th>Brand Image</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($brand as $brand)
                        
                        <tr>
                            <td>{{$brand->id}}</td>
                            <td>{{$brand->brand_name_en}}</td>
                            <td>{{$brand->brand_name_hindi}}</td>
                            <td><img src="{{asset($brand->brand_image)}}" style="width: 70px; height:40px" alt=""></td>
                            <td>
                              <a href="{{route('edit.brand',$brand->id)}}" class="btn btn-sm  btn-outline bg-info"><i class="bi bi-pencil-fill"></i></a>
                            </td>
                            <td>
                                <a id="delete" href="{{route('delete.brand',$brand->id)}}" class="btn btn-sm  btn-outline bg-danger"><i class="bi bi-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                      
                  </table>
                </div>
            </div>
            <!-- /.box-body -->
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