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
                            <th>Image </th>
                            <th>Product Name En</th>
                            <th>Product Name Hin </th>
                            <th>Product Price </th>
                            <th>Quantity </th>
                            <th>Discount </th>
                            <th>New Price</th>
                            <th>Status </th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach($product_data as $data)
                        <tr>
                            <td>{{$data->id}}</td>
                            <td><img src="{{asset($data->product_thambnail)}}" alt="" style="width: 60px; height:50px;"></td>
                            <td>{{ $data->product_name_en }}</td>
                            <td>{{ $data->product_name_hin }}</td>
                            <td>{{ $data->selling_price }} $</td>
                            <td>{{ $data->product_qty }}</td>
                       
                            <td> 
                              @if($data->discount_price == NULL)
                              <span class="badge badge-pill badge-danger">No Discount</span>
                       
                              @else
                              @php
                              $amount = $data->selling_price - $data->discount_price;
                              $discount = ($amount/$data->selling_price) * 100;
                              @endphp
                                  <span class="badge badge-pill badge-danger">{{ round($discount)  }} %</span>
                       
                              @endif
                       
                       
                       
                            </td>
                         
                            <td>
                              @if($data->discount_price == NULL)
                              <span class="badge badge-pill badge-danger">No Discount</span>
                       
                              @else
                              @php
                              $amount = $data->selling_price - $data->discount_price;
                              @endphp
                                  <span class="badge badge-pill badge-cancel">{{ round($amount)  }} </span>
                       
                              @endif
                            </td>

                            <td>
                              @if($data->status == 1)
                              <span class="badge badge-pill badge-success"> Active </span>
                              @else
                                  <span class="badge badge-pill badge-danger"> InActive </span>
                              @endif
                       
                            </td>


                           <td width="30%">
                            <a href="" class="btn btn-primary" title="Product Details Data"><i class="fa fa-eye"></i> </a>

                             <a href="{{ route('edit.products',$data->id) }}" class="btn btn-info" title="Edit Data"><i class="fa fa-pencil"></i> </a>

                            <a href="{{route('delete.product',$data->id)}}" class="btn btn-danger" title="Delete Data" id="delete">
                              <i class="fa fa-trash"></i></a>

                            @if($data->status == 1)
                            <a href="{{ route('product.inactive',$data->id) }}" class="btn btn-danger" title="Inactive Now"><i class="fa fa-arrow-down"></i> </a>
                              @else
                            <a href="{{ route('product.active',$data->id) }}" class="btn btn-success" title="Active Now"><i class="fa fa-arrow-up"></i> </a>
                              @endif




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