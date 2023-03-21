@extends('admin.admin_master')
@section('content')

<div class="container-full">
  

    <!-- Main content -->
    <section class="content">
      <div class="row">
          
        <div class="col-3 mt">

            <div class="box">
               <div class="box-header with-border">
                 <h3 class="box-title">Insert Slider Data</h3>
               </div>
               <!-- /.box-header -->
               <div class="container-fluid mt-3">
                <form action="{{route('slider.store')}}" method="post" enctype="multipart/form-data" >
                    @csrf
                    <div class="form-group">
                        <label for="">Title</label>
                        <input type="text" name="title"  class="form-control">
                        @error ('title')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                    </div>

                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea name="description"  cols="30" rows="3" class="bg-dark text-light"></textarea>
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
                        <img id="showImage" style="width: 70px; height:50px;" class="rounded-circle" src="{{(url('upload/no_image.jpg'))}}" alt="User Avatar">
                      </div>

                    <div class="form-group mt-2">
                        
                        <input type="submit" value="Insert Slider"  class="btn btn-success btn-rounded btn-outline">
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
              <h3 class="box-title">Slider Data</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Sno</th>
                            <th>Slider_Image</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($slider_data as $data)
                        
                        <tr>
                            <td>{{$data->id}}</td>
                            <td><img src="{{asset($data->slider_img)}}" style="width: 70px; height:40px" alt=""></td>
                            <td>
                                @if($data->title == Null)
                                <span class="badge badge-pill badge-danger"> No Title </span>
                                @else
                                    <span class="badge badge-pill badge-cancel">{{$data->title}}</span>
                                @endif
                         
                            </td>
                            <td>
                                @if($data->description == Null)
                                <span class="badge badge-pill badge-danger"> No Descp </span>
                                @else
                                    <span class="badge badge-pill badge-cancel">{{$data->description}}</span>
                                @endif  
                            </td>

                            <td>
                                @if($data->status == 1)
                                <span class="badge badge-pill badge-success"> Active </span>
                                @else
                                    <span class="badge badge-pill badge-danger"> InActive </span>
                                @endif
                         
                              </td>

                            <td>
                              <a href="{{route('edit.slider',$data->id)}}" class="btn btn-sm  btn-outline bg-info" title="Edit Slider"><i class="bi bi-pencil-fill"></i></a>
                           
                           
                                <a id="delete" href="{{route('delete.slider',$data->id)}}" class="btn btn-sm  btn-outline bg-danger" title="Delete Slider"><i class="bi bi-trash"></i></a>
                           

                            @if($data->status == 1)
                            <a href="{{ route('slider.inactive',$data->id) }}" class="btn btn-danger btn-sm" title="Inactive Now"><i class="fa fa-arrow-down"></i> </a>
                              @else
                            <a href="{{ route('slider.active',$data->id) }}" class="btn btn-success btn-sm" title="Active Now"><i class="fa fa-arrow-up"></i> </a>
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