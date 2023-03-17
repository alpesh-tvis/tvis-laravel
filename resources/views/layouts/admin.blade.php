<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Admin Panel</title>
  <link rel="stylesheet" href="{{ asset('admin') }}/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="{{ asset('admin') }}/css/adminlte.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
  <link href="{{ asset('admin/css/style.css') }}" rel="stylesheet"> 
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">

  
  @yield('style')
  <style>
 </style>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard') }}" class="brand-link">
      <span class="brand-text font-weight-light">Dashboard</span>
    </a>
    <a href="{{ route('website') }}" class="btn btn-primary text-white brand-link webtext" target="_blank">
      <span class="brand-text font-weight-dark web">View Website</span>
    </a>                    
    
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <!-- <img src="{{ asset('admin') }}/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"> -->
          
          @if( isset(Auth::user()->image))
              <img src="{{ url(Auth::user()->image) }}" class="img-circle elevation-2" alt="{{ url(Auth::user()->image)  }}">
          @else
              <img src="{{ url('/') }}/storage/user/userprofile.jpg" class="img-circle elevation-2" alt="...">
          @endif

        </div>
        <div class="info">
          <a href="{{ route('user.profile') }}" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ route('dashboard') }}" class="nav-link {{ (request()->is('admin/dashboard')) ? 'active': '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard   
              </p>
            </a>
          </li>
          
          <li class="nav-item mt-auto">
            <a href="{{ route('category.index') }}" class="nav-link {{ (request()->is('admin/category*')) ? 'active': '' }}">
              <i class="nav-icon fas fa-tags"></i>
              <p>
                Categories
              </p>
            </a>                    
          </li>
          <li class="nav-item mt-auto">
            <a href="{{ route('tag.index') }}" class="nav-link {{ (request()->is('admin/tag*')) ? 'active': '' }}">
              <i class="nav-icon fas fa-tag"></i>
              <p>
                Tags
              </p>
            </a>                    
          </li>
          <li class="nav-item mt-auto">
            <a href="{{ route('post.index') }}" class="nav-link {{ (request()->is('admin/post*')) ? 'active': '' }}">
              <i class="nav-icon fas fa-pen-square"></i>
              <p>
                Post
              </p>
            </a>                    
          </li>
          <li class="nav-item mt-auto">
            <a href="{{ route('comment.index') }}" class="nav-link {{ (request()->is('admin/comment*')) ? 'active': '' }}">
             <i class="nav-icon fa fa-comment" aria-hidden="true"></i>
              <p>
                Comment
              </p>
            </a>                    
          </li>
          <li class="nav-item mt-auto">
            <a href="{{ route('contact.index') }}" class="nav-link {{ (request()->is('admin/contact*')) ? 'active': '' }}">
              <i class="nav-icon fas fa-envelope"></i>
              <p>
                Messages
              </p>
            </a>                    
          </li>
           @if (Auth::user()->is_admin)
          <li class="nav-item mt-auto">
            <a href="{{ route('user.index') }}" class="nav-link {{ (request()->is('admin/user*')) ? 'active': '' }}">
              <i class="nav-icon fas fa-user"></i>
              <p>
                User
              </p>
            </a>
          </li>
           @endif
            @if (Auth::user()->is_admin)
          <li class="nav-item mt-auto">
            <a href="{{ route('role.index') }}" class="nav-link {{ (request()->is('admin/role*')) ? 'active': '' }}">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Role
              </p>
            </a>
          </li>
          @endif
          <li class="nav-item mt-auto">
            <a href="{{ route('product.index') }}" class="nav-link {{ (request()->is('admin/product*')) ? 'active': '' }}">
              <i class="nav-icon fa fa-shopping-cart" aria-hidden="true"></i>
              <p>
                Product
              </p>
            </a>
          </li>
          <li class="nav-item mt-auto prodcate">
            <a href="{{ route('productcategory.index') }}" class="nav-link {{ (request()->is('admin/productcategory')) ? 'active': '' }}">
              <i class="fa fa-list-alt"></i>
              <p>
                Product Category
              </p>
            </a>
          </li>
         <li class="nav-item mt-auto">
            <a href="{{ route('setting.index') }}" class="nav-link {{ (request()->is('admin/setting')) ? 'active': '' }}">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                Setting
              </p>
            </a>
          </li>
          <li class="nav-header">Your Account</li>
          
          <li class="nav-item mt-auto">
            <a href="{{ route('user.profile') }}" class="nav-link {{ (request()->is('admin/profile')) ? 'active': '' }}">
              <i class="nav-icon far fa-user"></i>
              <p>
                Your Profile
              </p>
            </a>
          </li>
          <li class="nav-item mt-auto">
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @yield('content')
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      <div class="mb-0">Developed By Tvistech on <a href="">Laravel Blog Development </a></div>
    </div>
    <!-- Default to the left -->
    <strong>{{ $setting->copyright }} <a href="">Tvistech</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->


<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
  @csrf
</form>

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{ asset('admin') }}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('admin') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('admin') }}/js/adminlte.min.js"></script>
<script src="{{ asset('admin') }}/js/bs-custom-file-input.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
@yield('script')
<script>
  @if(Session::has('success'))
  toastr.success("{{ Session::get('success') }}");
  @endif
  $(document).ready(function () {
    bsCustomFileInput.init()
  })
</script>
<script>
(function($) {

  $('.nav-toggle').on('click', function(e) {
    e.preventDefault();
    var toggle = $(this).add('.nav');
    toggle.toggleClass('active');
  });
  
})(jQuery);


(function($) {

  $('.mt-auto prodcate-toggle').on('click', function(e) {
    e.preventDefault();
    var toggle = $(this).add('.nav');
    toggle.toggleClass('active');
  });
  
})(jQuery);
</script>

<!--START DATATABLE JQUERY--------->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
 <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
 <script src="https://cdn.datatables.net/buttons/2.3.4/js/dataTables.buttons.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
 <script src="https://cdn.datatables.net/buttons/2.3.4/js/buttons.html5.min.js"></script>
 <script src="https://cdn.datatables.net/buttons/2.3.4/js/buttons.print.min.js"></script>
<!--DATATABLE JQUERY-------------->
</body>
</html>
