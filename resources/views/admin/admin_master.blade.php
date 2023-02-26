<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{asset('/backend/../images/favicon.ico')}}">

    <title>PACETMK - Admin</title>
    
	<!-- Vendors Style-->
	<link rel="stylesheet" href="{{asset('/backend/css/vendors_css.css')}}">
	  
	<!-- Style-->  
	<link rel="stylesheet" href="{{asset('/backend/css/style.css')}}">
	<link rel="stylesheet" href="{{asset('/backend/css/skin_color.css')}}">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">


  {{-- toaster  --}}
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha384-QE5YE6J8rzgHxYhiUzC6UJ39KfNQ6b5QP5w5+5p5J6e3C5Qf6bRXTdW27Ukv9zU6" crossorigin="anonymous">

  </head>

<body class="hold-transition dark-skin sidebar-mini theme-primary fixed">
	


 @include('admin.body.header')
  
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar-->
   @include('admin.body.sidebar')
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	 

		<!-- Main content -->
		
		@yield('content')
		<!-- /.content -->
  </div>


  <!-- /.content-wrapper -->
  	@include('admin.body.footer')

  <!-- Control Sidebar -->
  @include('admin.body.control')
  <!-- /.control-sidebar -->
  
  <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
  
</div>
<!-- ./wrapper -->
  	
	 
	@include('admin.body.script')
	
	
</body>
</html>
