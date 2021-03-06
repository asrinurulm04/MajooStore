<!DOCTYPE html>
<html>

<head>
    <title>@yield('title')</title>

	  <link href="{{ asset('images/logo2.png') }}" rel="icon">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('css/plugins/summernote/summernote-bs4.css') }}" rel="stylesheet">
    <link href="{{ asset('css/plugins/datapicker/datepicker3.css') }}" rel="stylesheet">
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/datatables.min.css') }}"/>
</head>

<body>
  <div id="wrapper">
    <div id="" class="gray-bg" style="min-height:740px;">
      <div class="row border-bottom">
        <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
          <div class="navbar-header">
            <ul class="nav navbar-top-links navbar-right">
              @if(auth()->user()->role_id === 1)
              <li><a href="{{route('ProfileUser',Auth::user()->id)}}"><i class="fa fa-user"></i>Profile</a></li>
              <li><a href="{{route('listuser')}}"><i class="fa fa-user"></i>List User</a></li>
              @elseif(auth()->user()->role_id === 3)
              <li><a href="{{route('dasboard')}}"><i class="fa fa-home"></i>Dasboard</a></li>
              <li><a href="{{route('ProfileUser',Auth::user()->id)}}"><i class="fa fa-user"></i>Profile</a></li>
              <li><a href="{{route('cart',auth()->user()->id)}}"><i class="fa fa-shopping-cart"></i>Keranjang</a></li>
              <li><a href="{{route('info',auth()->user()->id)}}"><i class="fa fa-shopping-bag"></i>Informasi</a></li>
              @elseif(auth()->user()->role_id === 2)
              <li><a href="{{route('dasboard')}}"><i class="fa fa-home"></i>Dasboard</a></li>
              <li><a href="{{route('laporan',Auth::user()->id)}}"><i class="fa fa-file"></i>Laporan</a></li>
              <li><a href="{{route('listProduk',Auth::user()->id)}}"><i class="fa fa-shopping-bag"></i>Produk</a></li>
              <li><a href="{{route('order',Auth::user()->id)}}"><i class="fa fa-shopping-basket"></i>Order @yield('hitung')</a> </li> 
              @endif
            </ul>
          </div>
          <ul class="nav navbar-top-links navbar-right">
            <li>
              <span class="m-r-sm text-muted welcome-message">Welcome, {{ Auth::user()->name }}</span>
            </li>
            <li>
              <a href="{{ route('signout') }}">
                <i class="fa fa-sign-out"></i> Log out
              </a>
            </li>
          </ul>
        </nav>
        </div>
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-12">
                @yield('info')
            </div>
        </div>

        <div class="wrapper wrapper-content animated fadeInRight ecommerce" >
          @yield('content')
        </div>

    </div>
</div>



<!-- Mainly scripts -->
<script src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.js') }}"></script>
<script src="{{ asset('js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>
<script src="{{ asset('js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('js/inspinia.js') }}"></script>
<script src="{{ asset('js/plugins/pace/pace.min.js') }}"></script>
<script src="{{ asset('js/plugins/datapicker/bootstrap-datepicker.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/datatables.min.js') }}"></script>
@yield('s')

</body>

</html>

