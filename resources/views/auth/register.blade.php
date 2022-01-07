<!DOCTYPE html>
<html lang="en">
  <head>
    <title>REGISTER</title>
    <link href="{{ asset('images/logo2.png') }}" rel="icon">
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrapp.min.css">
    <link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" type="text/css" href="css/utill.css">
    <link rel="stylesheet" type="text/css" href="css/mainn.css">
    <link rel="stylesheet" type="text/css" href="css/asri.css">
  </head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/background.jpg');">
			<div class="wrap-login100">
				<span class="login100-form-title p-b-34 p-t-27">  Register Now</span>
        <div class="container">
          <form class="form-login" method="post" action="{{ route('add') }}">
          <div class="login-wrap">
            <div class="form-group">
              <input class="form-control" autocomplete="off" id="name" name="name" placeholder="nama" value="{{ old('name') }}" type="text" minlength="2" autofocus required/>
            </div>
            <div class="form-group">
              <input class="form-control" autocomplete="off" id="username" name="username" placeholder="username" value="{{ old('username') }}" type="text" minlength="1" maxlength="12" required/>
            </div>
            <div class="form-group">
              <input class="form-control" id="password" name="password" placeholder="password" type="password" minlength="6" required/>
            </div>
            <div class="form-group">
              <input class="form-control" id="password_confirmation" name="password_confirmation" placeholder="confirm_password" type="password" required/>
            </div>
            <div class="form-group">
              <select id="role" name="role" class="form-control" >
                @foreach($roles as $role)
                <option value="{{  $role->id }}" >{{ $role->namaRule }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-groupcontainer-login100-form-btn">
              <button class="login100-form-btn btn-block" type="submit"><i class="fa fa-lock"></i> SIGN IN</button>
              {{ csrf_field() }}
              @include('formerrors')
            </div>
            </form>
            <div class="form-group registration text-center">
              <a href="{{ route('signin') }}">
                <h6 style="color:#fff">Already Have account ? Login</h6>
                </a>
            </div>
          </div>
        </div>
			</div>
		</div>
	</div>

	<div id="dropDownSelect1"></div>
	<script src="vendor/bootstrap/js/bootstrapp.min.js"></script>
	<script src="js/mainn.js"></script>
</body>
</html>