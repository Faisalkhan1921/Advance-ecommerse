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
                <form action="{{route('store.category')}}" method="post"  >
                    @csrf
                    <div class="form-group">
                        <label for="">Category Name En <span class="text-danger">*</span></label>
                        <input type="text" name="category_name_en"  class="form-control">
                        @error ('category_name_en')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Category Name Hindi <span class="text-danger">*</span></label>
                        <input type="text" name="category_name_hindi"  class="form-control">
                        @error ('category_name_hindi')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Category Icon <span class="text-danger">*</span></label>
                        <input type="text" name="category_icon" id="image"  class="form-control">
                        @error ('category_icon')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
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
              <h3 class="box-title">Category Data</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Sno</th>
                            <th>Category Name English</th>
                            <th>Category Name Hindi</th>
                            <th>Category Icon</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cat_data as $data)
                        
                        <tr>
                            <td>{{$data->id}}</td>
                            <td>{{$data->category_name_en}}</td>
                            <td>{{$data->category_name_hindi}}</td>
                            <td><span><i class="{{$data->category_icon}}"></i></span></td>
                            <td>
                              <a href="{{route('edit.category',$data->id)}}" class="btn btn-sm  btn-outline bg-info"><i class="bi bi-pencil-fill"></i></a>
                            </td>
                            <td>
                                <a id="delete" href="{{route('delete.category',$data->id)}}" class="btn btn-sm  btn-outline bg-danger"><i class="bi bi-trash"></i></a>
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