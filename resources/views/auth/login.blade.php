<!DOCTYPE html>
<html lang="en">
<head>
	<title>LOGIN</title>
	<link href="{{ asset('images/logo2.png') }}" rel="icon">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/bootstrap/css/bootstrapp.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/fonts/iconic/css/material-design-iconic-font.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/utill.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/mainn.css') }}">
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/background.jpg');">
      @if(session('status'))
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="alert alert-success">
          <button type="button" class="close" data-dismiss="alert">×</button>
          {{ session('status') }}
        </div>
      </div>
      @elseif(session('error'))
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="alert alert-danger">
          <button type="button" class="close" data-dismiss="alert">×</button>
          {{ session('error') }}
        </div>
      </div>
      @endif
			<div class="wrap-login100">
        <img class="img-fluid  d-block mx-auto" src="images/logo2.png" alt="" width="50%">
				<span class="login100-form-title p-b-34 p-t-27">
					Log in
				</span>
        <div id="login-page">
          <div class="container">
            <div class="login-wrap">
              <form class="form-login" method="POST" action="{{ url(action('LoginController@postLogin')) }}">
              <div class="form-group">
                <input type="text" autocomplete="off" class="form-control" id="inputEmailUser" name="inputEmailUser" {{ old('inputEmailUser') }} placeholder="Username" autofocus required>
              </div>
              <div class="form-group">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" minlength="6" required>
              </div>
              <div class="container-login100-form-btn">
                <button class="login100-form-btn" type="submit"><i class="fa fa-lock"></i> SIGN IN</button>
                {{ csrf_field() }}
                @if(count($errors) > 0)
                <br><div class="alert alert-danger" style="font-size:11px">
                  <strong>Whoops!</strong><br>
                  <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                  </ul>
                </div>
                @endif
              </div>
              </form><hr>
              <div class="registration text-center">
                Don't have an account yet?<br/>
                <a href="daftar">
                  Create an account
                </a>
              </div>
            </div>
          </div>
        </div>
			</div>
		</div>
	</div>
	
<script src="{{ asset('assets/vendor/bootstrap/js/bootstrapp.min.js') }}"></script>

</body>
</html>