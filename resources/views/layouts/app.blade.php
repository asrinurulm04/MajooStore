<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Maruti Admin Template by WrapPixel</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-responsive.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/select2.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/maruti-style.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/maruti-media.css') }}" class="skin-color" />
    <link href="{{ asset('eco/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('eco/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('eco/css/plugins/toastr/toastr.min.css') }}" rel="stylesheet">
    <link href="{{ asset('eco/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('eco/css/style.css') }}" rel="stylesheet">

    <!-- Favicon icon -->
    <link href="{{ asset('images/logo2.png') }}" rel="icon">
  </head>

  <body>
    <div class="btn-group rightzero">
      <a class="top_message tip-left" title="Manage Files"><i class="icon-file"></i></a>
    </div>

    <!--top-Header-menu-->
    <div id="user-nav" class="navbar navbar-inverse btn-group rightzero">
      <ul class="nav">
        <li class="">
          <a title="" href="#"><i class="icon icon-user"></i> <span class="text">Profile</span></a>
        </li>
        <li class="">
          <a title="" href="{{ route('signout') }}"><i class="icon icon-share-alt"></i>
            <span class="text">Logout</span>
					</a>
        </li>
      </ul>
    </div>
    <!--close-top-Header-menu-->
    <!--left-menu-stats-sidebar-->
    <div id="sidebar">
      <ul>
        <li class="active">
          <a href="index.html"><i class="icon icon-home"></i> <span>Dashboard</span></a>
        </li>
        <li class="submenu">
          <a href="#"><i class="icon icon-signal"></i> <span>Report</span>
            <span class="label label-important">3</span></a>
          <ul>
            <li><a href="form-common.html">Laporan Penjualan</a></li>
            <li><a href="form-validation.html">Laporan Pembelian</a></li>
          </ul>
        </li>
        <li>
          <a href="widgets.html"><i class="icon icon-inbox"></i> <span>Widgets</span></a>
        </li>
        <li>
          <a href="tables.html"
            ><i class="icon icon-th"></i> <span>Tables</span></a>
        </li>
        <li>
          <a href="grid.html"><i class="icon icon-fullscreen"></i> <span>Full width</span></a>
        </li>
        <li class="submenu">
          <a href="#"><i class="icon icon-shopping-cart"></i> <span>Product</span>
            <span class="label label-important">3</span></a>
          <ul>
            <li><a href="form-common.html">List Produk</a></li>
            <li><a href="form-validation.html">Tambah Produk Baru</a></li>
            <li><a href="form-wizard.html">Form with Wizard</a></li>
          </ul>
        </li>
        <li class="submenu">
          <a href="#"><i class="icon icon-th-list"></i> <span>Data Master</span>
            <span class="label label-important">3</span></a>
          <ul>
            <li><a href="form-common.html">List Produk</a></li>
            <li><a href="form-validation.html">Form with Validation</a></li>
            <li><a href="form-wizard.html">Form with Wizard</a></li>
          </ul>
        </li>
      </ul>
    </div>
    <!--close-left-menu-stats-sidebar-->

    <div id="content">
      <div id="content-header">
        <div id="breadcrumb">
          @yield('halaman')
        </div>
      </div>
      <div class="container-fluid">
          @yield('content')
      </div>
    </div>
    <div class="row-fluid">
      <div id="footer" class="span12">
        2022 &copy; By Asri Nurul M
      </div>
    </div>
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.ui.custom.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap-colorpicker.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.uniform.js') }}"></script>
    <script src="{{ asset('assets/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/js/maruti.js') }}"></script>
    <script src="{{ asset('assets/js/maruti.form_common.js') }}"></script>
  </body>
</html>
