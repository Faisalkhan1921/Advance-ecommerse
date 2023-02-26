@extends('admin.admin_master')
@section('content')
<div class="container-full">
  

    <!-- Main content -->
    <section class="content">
      <div class="row">
          
        <div class="col-3 mt">

            <div class="box">
               <div class="box-header with-border">
                 <h3 class="box-title">Insert Data</h3>
               </div>
               <!-- /.box-header -->
               <div class="container-fluid mt-3">
                <form action="{{route('update.subcat',$subcat->id)}}" method="post"  >
                    @csrf

                    <div class="form-group">
                        <h5>Category Select <span class="text-danger">*</span></h5>
                        <div class="controls">
                            <select name="category_id" id="select" class="form-control">
                                
                                <option value="" selected="" disabled="">Select Category</option>
                                @foreach($cat as $data)
                                <option {{$data->id == $subcat->category_id ? 'selected': ''}} value="{{$data->id}}">{{$data->category_name_en}}</option>
                                @endforeach
                                
                            </select>
                            @error ('category_id')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">SubCategory Name En <span class="text-danger">*</span></label>
                        <input type="text" name="subcat_name_en"  class="form-control" value="{{$subcat->subcat_name_en}}">
                            @error ('subcat_name_en')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">SubCategory Name Hindi <span class="text-danger">*</span></label>
                        <input type="text" name="subcat_name_hindi"  class="form-control" value="{{$subcat->subcat_name_hindi}}">
                        @error ('subcat_name_hindi')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                    </div>

                 
                    

                    <div class="form-group mt-2">
                        
                        <input type="submit" value="Update Subcategory"  class="btn btn-info btn-rounded btn-outline">
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