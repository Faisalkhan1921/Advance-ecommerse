@extends('admin.admin_master')
@section('content')

<div class="container-full">
  

    <!-- Main content -->
    <section class="content">
      <div class="row">
          
        <div class="col-4 mt">

            <div class="box">
               <div class="box-header with-border">
                 <h3 class="box-title">Update Category Data</h3>
               </div>
               <!-- /.box-header -->
               <div class="container-fluid mt-3" >
                
                <form action="{{route('update.cat.data',$data->id)}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="">Categpru Name En</label>
                        <input type="text" name="category_name_en" value="{{$data->category_name_en}}"  class="form-control">
                        @error ('category_name_en')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Category Name Hindi</label>
                        <input type="text" name="category_name_hindi" value="{{$data->category_name_hindi}}"  class="form-control">
                        @error ('category_name_hindi')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Category Icon</label>
                        <input type="text" name="category_icon" id="image"  class="form-control" value="{{$data->category_icon}}" >
                        @error ('category_icon')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                    </div>
                    
                   

                    <div class="form-group mt-2">
                        
                        <input type="submit" value="Update Category"  class="btn btn-success btn-rounded btn-outline">
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