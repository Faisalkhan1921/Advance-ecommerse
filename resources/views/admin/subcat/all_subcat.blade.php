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
                <form action="{{route('store.subcat')}}" method="post"  >
                    @csrf

                    <div class="form-group">
                        <h5>Category Select <span class="text-danger">*</span></h5>
                        <div class="controls">
                            <select name="category_id" id="select" class="form-control">
                                
                                <option value="" selected="" disabled="">Select Category</option>
                                @foreach($cat as $data)
                                <option value="{{$data->id}}">{{$data->category_name_en}}</option>
                                @endforeach
                                
                            </select>
                            @error ('category_id')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">SubCategory Name En <span class="text-danger">*</span></label>
                        <input type="text" name="subcat_name_en"  class="form-control">
                            @error ('subcat_name_en')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">SubCategory Name Hindi <span class="text-danger">*</span></label>
                        <input type="text" name="subcat_name_hindi"  class="form-control">
                        @error ('subcat_name_hindi')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                    </div>

                 
                    

                    <div class="form-group mt-2">
                        
                        <input type="submit" value="Add Subcategory"  class="btn btn-success btn-rounded btn-outline">
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
              <h3 class="box-title">SubCategory Data</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Category ID</th>
                            <th>SubCategory Name English</th>
                            <th>SubCategory Name Hindi</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($subcategory as $data)
                        
                        <tr>
                            <td>{{ $data['category']['category_name_en']}}</td>
                            <td>{{$data->subcat_name_en}}</td>
                            <td>{{$data->subcat_name_hindi}}</td>
                            {{-- <td><span><i class="{{$data->category_icon}}"></i></span></td> --}}
                            <td>
                              <a href="{{route('edit.subcat',$data->id)}}" class="btn btn-sm  btn-outline bg-info"><i class="bi bi-pencil-fill"></i></a>
                            </td>
                            <td>
                                <a id="delete" href="{{route('delete.subcat',$data->id)}}" class="btn btn-sm  btn-outline bg-danger"><i class="bi bi-trash"></i></a>
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