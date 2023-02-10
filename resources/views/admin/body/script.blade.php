<!-- Vendor JS -->
<script src="{{asset('backend/js/vendors.min.js')}}"></script>
<script src="{{asset('backend/../assets/icons/feather-icons/feather.min.js')}}"></script>	
<script src="{{asset('')}}backend/../assets/vendor_components/easypiechart/dist/jquery.easypiechart.js"></script>
<script src="{{asset('backend/../assets/vendor_components/apexcharts-bundle/irregular-data-series.js')}}"></script>
<script src="{{asset('backend/../assets/vendor_components/apexcharts-bundle/dist/apexcharts.js')}}"></script>

<!-- Sunny Admin App -->
<script src="{{asset('backend/js/template.js')}}"></script>
<script src="{{asset('backend/js/pages/dashboard.js')}}"></script>

{{-- icon script  --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

{{-- jquery --}}
<script src="{{asset('backend/jquery/query.min.js')}}"></script>

<script type="text/javascript">

    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>


{{-- toaster  --}}

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

 <script>
  @if(Session::has('message'))
  var type = "{{ Session::get('alert-type','info') }}"
  switch(type){
     case 'info':
     toastr.info(" {{ Session::get('message') }} ");
     break;
 
     case 'success':
     toastr.success(" {{ Session::get('message') }} ");
     break;
 
     case 'warning':
     toastr.warning(" {{ Session::get('message') }} ");
     break;
 
     case 'error':
     toastr.error(" {{ Session::get('message') }} ");
     break; 
  }
  @endif 
 </script>
