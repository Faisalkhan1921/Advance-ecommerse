@extends('admin.admin_master')
@section('content')
<div class="container-full">
  

    <!-- Main content -->
    <section class="content">
      <div class="row">
          
     


        <div class="col-12">

         <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Display Product Data</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Product ID</th>
                            <th>Thumbnail</th>
                            <th>Product Name English</th>
                            <th>Product Name Hindi</th>
                            <th>Product Quantiy</th>
                            <th>Size</th>
                            <th>Color</th>
                            <th>Sell Price</th>
                            <th>Discount Price</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach($product_data as $data)
                        <tr>
                            <td>{{$data->id}}</td>
                            <td><img src="{{asset($data->product_thambnail)}}" alt="" style="width: 60px; height:50px;"></td>
                            <td>{{$data->product_name_en}}</td>
                            <td>{{$data->product_name_hin}}</td>
                            <td>{{$data->product_qty}}</td>
                            <td>{{$data->product_size_en}}</td>
                            <td>{{$data->product_color_en}}</td>
                            <td>{{$data->selling_price}}</td>
                            <td>{{$data->discount_price}}</td>
                           
                            <td>
                              <a href="{{route('edit.sub_subcat',$data->id)}}" class="btn btn-sm  btn-outline bg-info"><i class="bi bi-pencil-fill"></i></a>
                            </td>
                            <td>
                                <a id="delete" href="{{route('delete.sub_subcat',$data->id)}}" class="btn btn-sm  btn-outline bg-danger"><i class="bi bi-trash"></i></a>
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