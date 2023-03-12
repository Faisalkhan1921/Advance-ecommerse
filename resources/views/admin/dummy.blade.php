<div class="form-group">
    <h5>Main Thambnail <span class="text-danger">*</span></h5>
    <div class="controls">
<input type="file" name="product_thambnail" class="form-control" onchange="mainThumUrl(this)" >
@error('product_thambnail') 
<span class="text-danger">{{ $message }}</span>
@enderror
<img src="" alt="" id="mainThum">
      </div>
      </div>



      {{-- multi image  --}}

      <div class="form-group">
        <h5>Multiple Image <span class="text-danger">*</span></h5>
    <div class="controls">
<input type="file" name="multi_img[]" multiple="" id="multiImg" class="form-control" >
@error('multi_img') 
<span class="text-danger">{{ $message }}</span>
@enderror
<div class="row" id="preview_image"></div>
      </div>
    </div>