@extends('layouts.app')
@section('title', 'List Produk')
@section('info')
	<h2>Data Toko</h2>
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="index.html">Dasboard</a>
    </li>
    <li class="breadcrumb-item active">
      <strong>Profile</strong>
    </li>
  </ol>
@endsection
@section('content')

@if (session('status'))
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

<form class="form-horizontal form-label-left" method="POST" action="{{ route('update',Auth::user()->id) }}">
<div class="row">
  <div class="col-lg-12">
    <div class="ibox ">
      <div class="ibox-title">
        <h3><li class="fa fa-home"></li> Data </h3>
      </div>
      <div class="ibox-content">
        <div class="row">
          <div class="col-sm-12 b-r">
            <div class="form-group row">
              <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">Nama*</label>
              <div class="col-md-9 col-sm-8 col-xs-12">
                <input id="name" class="form-control " value="{{ Auth::user()->name }}" type="text" name="name">
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">Username*</label>
              <div class="col-md-9 col-sm-8 col-xs-12">
                <input id="username" class="form-control" value="{{$user->username}}" required value="" type="text" name="username" >
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">Alamat Toko*</label>
              <div class="col-md-9 col-sm-8 col-xs-12">
                <input id="alamat" class="form-control" value="{{$user->alamat}}" required value="" type="text" name="alamat" >
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">No Telepon*</label>
              <div class="col-md-9 col-sm-8 col-xs-12">
                <input id="no" class="form-control" value="{{$user->no_telp}}" required value="" type="text" name="no_telp" >
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name" >Password</label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <input class="form-control" id="myInput" name="password" placeholder="password" type="password" minlength="6" required/>
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name" ></label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <input type="checkbox" onclick="myFunction()"> Lihat Password
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name" >Confirm password</label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <input class="form-control" id="password_confirmation" name="password_confirmation" placeholder="confirm_password" type="password" required/>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-12">
    <div class="ibox ">
      <div class="ibox-content">
        <div class="col-md-12 col-sm-offset-5 col-md-offset-5 text-center">
          <button type="reset" class="btn btn-warning btn-sm"><li class="fa fa-repeat"></li> Reset</button>
          <button type="submit" class="btn btn-success btn-sm"><li class="fa fa-check"></li> Submit</button>
          {{ csrf_field() }}
        </div
      </div>
    </div>
  </div>
</div>
</form>
@endsection
@section('s')
<script>
function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
@endsection