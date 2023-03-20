@php 
$data = App\Models\Admin::find(1);
@endphp

@php
$route = Route::current()->getName();
@endphp

<section class="sidebar">	
	
    <div class="user-profile">
        <div class="ulogo">
             <a href="index.html">
              <!-- logo for regular state and mobile devices -->
                 <div class="d-flex align-items-center justify-content-center">					 	
                      <img src="{{asset('backend/images/logo-dark.png')}}" alt="">
                      <h3><b>{{$data->name}}</b></h3>
                 </div>
            </a>
        </div>
    </div>
  
  <!-- sidebar menu-->
  <ul class="sidebar-menu" data-widget="tree">  
      
    <li>
      <a href="{{route('dashboard')}}">
        <i data-feather="pie-chart"></i>
        <span>Dashboard</span>
      </a>
    </li>  
    
    <li class="treeview">
      <a href="#">
        <i data-feather="message-circle"></i>
        <span>Brands</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-right pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li class="{{($route == 'all.brands') ?  'active' : '' }}"><a href="{{route('all.brands')}}"><i class="ti-more"></i>All Brands</a></li>
      </ul>
    </li> 
      
    <li class="treeview">
      <a href="#">
        <i data-feather="mail"></i> <span>Category</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-right pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li class="{{($route == 'all.category') ?  'active' : '' }}"><a href="{{route('all.category')}}"><i class="ti-more"></i>All Category</a></li>
        <li class="{{($route == 'all.subcat') ?  'active' : '' }}"><a href="{{route('all.subcat')}}"><i class="ti-more"></i>All SubCategory</a></li>
        <li class="{{($route == 'all.sub_subcat') ?  'active' : '' }}"><a href="{{route('all.sub_subcat')}}"><i class="ti-more"></i>All Sub -> SubCategory</a></li>
      </ul>
    </li>
    
    {{-- PRODUCT  --}}
    <li class="treeview">
      <a href="#">
        <i data-feather="file"></i>
        <span>Products</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-right pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li class="{{($route == 'all.products') ?  'active' : '' }}"><a href="{{route('all.products')}}"><i class="ti-more"></i>Add Products</a></li>
        <li class="{{($route == 'manage.products') ?  'active' : '' }}"><a href="{{route('manage.products')}}"><i class="ti-more"></i>Maange Products</a></li>
      </ul>
    </li> 		  
     {{-- sLIDER  --}}

     <li class="treeview">
      <a href="#">
        <i data-feather="file"></i>
        <span>Slider</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-right pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li class="{{($route == 'manage.slider') ?  'active' : '' }}"><a href="{{route('manage.slider')}}"><i class="ti-more"></i>Manage Slider</a></li>
        </ul>
    </li> 		  



    <li class="header nav-small-cap">User Interface</li>
      
    <li class="treeview">
      <a href="#">
        <i data-feather="grid"></i>
        <span>Components</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-right pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="components_alerts.html"><i class="ti-more"></i>Alerts</a></li>
        <li><a href="components_badges.html"><i class="ti-more"></i>Badge</a></li>
        <li><a href="components_buttons.html"><i class="ti-more"></i>Buttons</a></li>
        <li><a href="components_sliders.html"><i class="ti-more"></i>Sliders</a></li>
        <li><a href="components_dropdown.html"><i class="ti-more"></i>Dropdown</a></li>
        <li><a href="components_modals.html"><i class="ti-more"></i>Modal</a></li>
        <li><a href="components_nestable.html"><i class="ti-more"></i>Nestable</a></li>
        <li><a href="components_progress_bars.html"><i class="ti-more"></i>Progress Bars</a></li>
      </ul>
    </li>
    
    <li class="treeview">
      <a href="#">
        <i data-feather="credit-card"></i>
        <span>Cards</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-right pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="card_advanced.html"><i class="ti-more"></i>Advanced Cards</a></li>
        <li><a href="card_basic.html"><i class="ti-more"></i>Basic Cards</a></li>
        <li><a href="card_color.html"><i class="ti-more"></i>Cards Color</a></li>
      </ul>
    </li>  
      
      
    		  
      
    <li class="header nav-small-cap">EXTRA</li>		  
      
    <li class="treeview">
      <a href="#">
        <i data-feather="layers"></i>
        <span>Multilevel</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-right pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="#">Level One</a></li>
        <li class="treeview">
          <a href="#">Level One
            <span class="pull-right-container">
          <i class="fa fa-angle-right pull-right"></i>
        </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#">Level Two</a></li>
            <li class="treeview">
              <a href="#">Level Two
                <span class="pull-right-container">
                  <i class="fa fa-angle-right pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="#">Level Three</a></li>
                <li><a href="#">Level Three</a></li>
              </ul>
            </li>
          </ul>
        </li>
        <li><a href="#">Level One</a></li>
      </ul>
    </li>  
      
    <li>
      <a href="auth_login.html">
        <i data-feather="lock"></i>
        <span>Log Out</span>
      </a>
    </li> 
    
  </ul>
</section>

<div class="sidebar-footer">
    <!-- item-->
    <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Settings" aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
    <!-- item-->
    <a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i class="ti-email"></i></a>
    <!-- item-->
    <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="ti-lock"></i></a>
</div>