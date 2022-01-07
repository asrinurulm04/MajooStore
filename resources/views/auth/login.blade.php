<!DOCTYPE html>
<html lang="en">
<head>
	<title>LOGIN</title>
	<link href="{{ asset('images/logo2.png') }}" rel="icon">
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrapp.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" type="text/css" href="css/utill.css">
	<link rel="stylesheet" type="text/css" href="css/mainn.css">
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/background.jpg');">
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
                <input type="text" autocomplete="off" class="form-control" id="inputEmailUser" name="inputEmailUser" {{ old('inputEmailUser') }} placeholder="E-mail Or Username" autofocus required>
              </div>
              <div class="form-group">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" minlength="6" required>
              </div>
              <div class="container-login100-form-btn">
                <button class="login100-form-btn" type="submit"><i class="fa fa-lock"></i> SIGN IN</button>
                {{ csrf_field() }}
                @include('formerrors')
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
	
	<script src="vendor/bootstrap/js/bootstrapp.min.js"></script>
	<script src="js/mainn.js"></script>

</body>
</html>