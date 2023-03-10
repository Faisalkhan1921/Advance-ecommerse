@extends('admin.admin_master')
@section('content')
    
<div class="container-full">
    <!-- Content Header (Page header) -->


    <!-- Main content -->
    <section class="content">

     <!-- Basic Forms -->
      <div class="box">
        <div class="box-header with-border">
          <h4 class="box-title">Update Product </h4>

        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col">
                <form  method="POST" action="{{route('products.data.update',$product->id)}}"  >
                    @csrf 
                  <div class="row">
<div class="col-12">	


    <div class="row"> <!-- start 1st row  -->
        <div class="col-md-4">

                <div class="form-group">
                <h5>Brand Select <span class="text-danger">*</span></h5>
                <div class="controls">
                    <select name="brand_id" class="form-control"  >
                        <option value="" selected="" disabled="">Select Brand</option>
                        @foreach($brands as $brand)
                <option {{$brand->id == $product->brand_id ? 'selected': ''}} value="{{ $brand->id }}">{{ $brand->brand_name_en }}</option>	
                        @endforeach
                    </select>
                    @error('brand_id') 
                <span class="text-danger">{{ $message }}</span>
                @enderror 
                </div>
                    </div>

                        </div> <!-- end col md 4 -->

        <div class="col-md-4">

             <div class="form-group">
                    <h5>Category Select <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <select name="category_id" class="form-control"  >
                            <option value="" selected="" disabled="">Select Category</option>
                            @foreach($categories as $category)
                    <option {{$category->id == $product->category_id ? 'selected': ''}} value="{{ $category->id }}">{{ $category->category_name_en }}</option>	
                            @endforeach
                        </select>
                        @error('category_id') 
                    <span class="text-danger">{{ $message }}</span>
                    @enderror 
                    </div>
                        </div>

                            </div> <!-- end col md 4 -->


        <div class="col-md-4">

             <div class="form-group">
                    <h5>SubCategory Select <span class="text-danger">*</span></h5>
                    <div class="controls">
                        <select name="subcategory_id" class="form-control"  >
                            <option value="" selected="" disabled="">Select SubCategory</option>
                            @foreach($subcat as $data)
                            <option {{$data->id == $product->subcategory_id ? 'selected': ''}} value="{{ $data->id }}">{{ $data->subcat_name_en }}</option>	
                            @endforeach
                        </select>
                        @error('subcategory_id') 
                    <span class="text-danger">{{ $message }}</span>
                    @enderror 
                    </div>
                        </div>

                            </div> <!-- end col md 4 -->

    </div> <!-- end 1st row  -->

    <div class="row"> <!-- start 2nd row  -->
        <div class="col-md-4">

                <div class="form-group">
                <h5>SubSubCategory Select <span class="text-danger">*</span></h5>
                <div class="controls">
                    <select name="subsubcategory_id" class="form-control"  >
                        <option value="" selected="" disabled="">Select SubSubCategory</option>
                        @foreach($sub_subcat as $data)
                            <option {{$data->id == $product->subsubcategory_id ? 'selected': ''}} value="{{ $data->id }}">{{ $data->sub_subcategory_name_en }}</option>	
                        @endforeach
                    </select>
                    @error('subsubcategory_id') 
                <span class="text-danger">{{ $message }}</span>
                @enderror 
                </div>
                    </div>

                        </div> <!-- end col md 4 -->

        <div class="col-md-4">

             <div class="form-group">
        <h5>Product Name En <span class="text-danger">*</span></h5>
        <div class="controls">
            <input type="text" name="product_name_en" class="form-control" value="{{$product->product_name_en}}">
 @error('product_name_en') 
 <span class="text-danger">{{ $message }}</span>
 @enderror
       </div>
    </div>

        </div> <!-- end col md 4 -->


        <div class="col-md-4">
        <div class="form-group">
            <h5>Product Name Hin <span class="text-danger">*</span></h5>
            <div class="controls">
            <input type="text" name="product_name_hin" class="form-control" value="{{$product->product_name_hin}}">
            @error('product_name_hin') 
            <span class="text-danger">{{ $message }}</span>
            @enderror
         </div>
    </div>

        </div> <!-- end col md 4 -->

    </div> <!-- end 2nd row  -->


    {{-- third row  --}}
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <h5>Product Code <span class="text-danger">*</span></h5>
                <div class="controls">
                    <input type="text" name="product_code" class="form-control" value="{{$product->product_code}}">
         @error('product_code') 
         <span class="text-danger">{{ $message }}</span>
         @enderror
               </div>
            </div>
        </div>
        {{-- end of col-md-4  --}}


        <div class="col-md-4">
            <div class="form-group">
            <h5>Product Quantity <span class="text-danger">*</span></h5>
            <div class="controls">
                <input type="text" name="product_qty" class="form-control" value="{{$product->product_qty}}">
                @error('product_qty') 
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            </div>

        </div>
        {{-- end of col-md-4  --}}

        <div class="col-md-4">
            <div class="form-group">
                <h5>Product Tags En <span class="text-danger">*</span></h5>
                <div class="controls">
         <input type="text" name="product_tags_en" class="form-control"  data-role="tagsinput" value="{{$product->product_tags_en}}">
         @error('product_tags_en') 
         <span class="text-danger">{{ $message }}</span>
         @enderror
                  </div>
            </div>
        </div>
        {{-- end of col-md-4  --}}

    </div>

    {{-- end of third row here  --}}

    {{-- start of 4th row here  --}}
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <h5>Product Tags Hin <span class="text-danger">*</span></h5>
         <input type="text" name="product_tags_hin" class="form-control"  data-role="tagsinput" value="{{$product->product_tags_hin}}">
         @error('product_tags_hin') 
         <span class="text-danger">{{ $message }}</span>
         @enderror
                  </div>
            
        </div>
        {{-- end of col-md-4 --}}


        <div class="col-md-4">
            <div class="form-group">
                <h5>Product Size En <span class="text-danger">*</span></h5>
                <div class="controls">
         <input type="text" name="product_size_en" class="form-control"  data-role="tagsinput" value="{{$product->product_size_en}}">
         @error('product_size_en') 
         <span class="text-danger">{{ $message }}</span>
         @enderror
                  </div>
            </div>
        </div>
        {{-- end of col-md-4 --}}


        <div class="col-md-4">
            
				 <div class="form-group">
                    <h5>Product Size Hin <span class="text-danger">*</span></h5>
                    <div class="controls">
             <input type="text" name="product_size_hin" class="form-control"  data-role="tagsinput" value="{{$product->product_size_hin}}">
             @error('product_size_hin') 
             <span class="text-danger">{{ $message }}</span>
             @enderror
                      </div>
                </div>
        </div>
        {{-- end of col-md-4 --}}

    </div>


 {{-- start of 5th row here  --}}
 <div class="row">
    <div class="col-md-6">
        <div class="form-group">
			<h5>Product Color En <span class="text-danger">*</span></h5>
	 <input type="text" name="product_color_en" class="form-control" value="red,Black,Amet" data-role="tagsinput" value="{{$product->product_color_en}}">
     @error('product_color_en') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror
	 		 </div>
	
        
    </div>
    {{-- end of col-md-4 --}}


    <div class="col-md-6">
        <div class="form-group">
            <h5>Product Color Hin <span class="text-danger">*</span></h5>
			<div class="controls">
	 <input type="text" name="product_color_hin" class="form-control" value="red,Black,Large" data-role="tagsinput" value="{{$product->product_color_hindi}}">
     @error('product_color_hin') 
	 <span class="text-danger">{{ $message }}</span>
	 @enderror
	 		 </div>
        </div>
    </div>
    {{-- end of col-md-4 --}}


    <div class="col-md-4">
        
            
    </div>
    {{-- end of col-md-4 --}}

</div>
{{-- end of 5th row  --}}


{{-- start of 6th row here  --}}
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
			<h5>Product Discount Price <span class="text-danger">*</span></h5>
			<div class="controls">
                <input type="text" name="discount_price" class="form-control" value="{{$product->discount_price}}">
                @error('discount_price') 
                <span class="text-danger">{{ $message }}</span>
                @enderror
	 		 </div>
    </div>
</div>
    {{-- end of col-md-4 --}}

    

    <div class="col-md-6">
        <div class="form-group">
            <h5>Product Selling Price <span class="text-danger">*</span></h5>
        <div class="controls">
            <input type="text" name="selling_price" class="form-control" value="{{$product->selling_price}}">
 @error('selling_price') 
 <span class="text-danger">{{ $message }}</span>
 @enderror
       </div>
        </div>

        </div>
    {{-- end of col-md-4 --}}


    <div class="col-md-4">
        
         
    </div>
    {{-- end of col-md-4 --}}

</div>
{{-- end of 6th row  --}}


{{-- start of 6th row here  --}}
<div class="row">


    <div class="col-md-6">
        <div class="form-group">
            <h5>Short Description English <span class="text-danger">*</span></h5>
			<div class="controls">
	<textarea name="short_descp_en" id="textarea" class="form-control"  placeholder="Textarea text">{!! $product->short_descp_en !!}</textarea>     
	 		 </div>	
    </div>
</div>
    {{-- end of col-md-6 --}}

    

    <div class="col-md-6">
        <div class="form-group">
            <h5>Short Description Hindi <span class="text-danger">*</span></h5>
			<div class="controls">
	<textarea name="short_descp_hin" id="textarea" class="form-control"  placeholder="Textarea text">{!! $product->short_descp_hin !!}</textarea>     
	 		 </div>
        </div>
</div>
    {{-- end of col-md-6 --}}


  

</div>
{{-- end of 7th row  --}}


<div class="row">

    <div class="col-md-6">
        <div class="form-group">
            <h5>Long Description English <span class="text-danger">*</span></h5>
			<div class="controls">
	<textarea id="editor1" name="long_descp_en" rows="10" cols="80">{!! $product->long_descp_en !!}</textarea>  
	 		 </div>
        </div>
    </div>


    <div class="col-md-6">
        <div class="form-group">
            <h5>Long Description English <span class="text-danger">*</span></h5>
			<div class="controls">
	<textarea id="editor2" name="long_descp_hindi" rows="10" cols="80">{!! $product->long_descp_hin !!}</textarea>  
	 		 </div>
        </div>
    </div>
</div>

<div class="row mt-3">
    
    <div class="col-md-6">
        <div class="form-group">
            <div class="controls">
                <fieldset>
                    <input type="checkbox" id="checkbox_2" name="hot_deals" value="1" {{$product->hot_deals == 1 ? 'checked' : ''}}>
                    <label for="checkbox_2">Hot Deals</label>
                </fieldset>
                <fieldset>
                    <input type="checkbox" id="checkbox_3" name="featured" value="1" {{$product->featured == 1 ? 'checked' : ''}}>
                    <label for="checkbox_3">Featured</label>
                </fieldset>
            </div>
        </div>
    </div>


    <div class="col-md-6">
        <div class="form-group">
            <div class="controls">
                <fieldset>
                    <input type="checkbox" id="checkbox_4" name="special_offer" value="1" {{$product->special_offer == 1 ? 'checked' : ''}}>
                    <label for="checkbox_4">Special Offers</label>
                </fieldset>
                <fieldset>
                    <input type="checkbox" id="checkbox_5" name="special_deals" value="1" {{$product->special_deals == 1 ? 'checked' : ''}}>
                    <label for="checkbox_5">Special Deals</label>
                </fieldset>
            </div>
        </div>
    </div>

</div>

                    <div class="text-xs-right">
<input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Product">
                    </div>
                </form>

            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->


          
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box bt-3 border-info">
                    <div class="box-header">
                        <h4 class="box-title">Product Thumbnail and Multi_Image<strong>Update</strong></h4>
                    </div>

                    <form action="" enctype="multipart/form-data">
                        <div class="row row-sm">
                            @foreach($multi_image as $img)
                            <div class="col-md-3">
            
                                <div class="card">
                                <img src="{{ asset($img->photo_name) }}" class="card-img-top" style="height: 130px; width: 280px;">
                                <div class="card-body">
                                    <h5 class="card-title">
                                <a href="" class="btn btn-sm btn-danger" id="delete" title="Delete Data"><i class="fa fa-trash"></i> </a>
                                    </h5>
                                    <p class="card-text"> 
                                        <div class="form-group">
                                            <label class="form-control-label">Change Image <span class="tx-danger">*</span></label>
                                            <input class="form-control" type="file" name="multi_img[ $img->id ]">
                                        </div> 
                                    </p>
                                
                                </div>
                                </div> 		
                                
                            </div><!--  end col md 3		 -->	
                            @endforeach
            
                        </div>			
            
                        <div class="text-xs-right">
            <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Image">
                     </div>
            <br><br>
            
                    </form>
                </div>
            </div>
        </div>
    </section>




  </div>


@endsection