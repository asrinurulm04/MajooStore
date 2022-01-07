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
<form class="form-horizontal form-label-left" method="POST" action="{{ route('addToko') }}">
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
              <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">Nama Pemilik*</label>
              <div class="col-md-9 col-sm-8 col-xs-12">
                <input id="reason" class="form-control " value="{{ Auth::user()->name }}" type="text" name="reason" readonly>
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">Nama Toko*</label>
              <div class="col-md-9 col-sm-8 col-xs-12">
                <input id="nama_toko" class="form-control " required value="" type="text" name="nama_toko" >
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">Alamat Toko*</label>
              <div class="col-md-9 col-sm-8 col-xs-12">
                <input id="alamat" class="form-control " required value="" type="text" name="alamat" >
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">Email*</label>
              <div class="col-md-9 col-sm-8 col-xs-12">
                <input id="email" class="form-control " required value="" type="email" name="email" >
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">No Telepon*</label>
              <div class="col-md-9 col-sm-8 col-xs-12">
                <input id="no" class="form-control " required value="" type="text" name="no" >
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">Type Usaha</label>
              <div class="col-md-9 col-sm-8 col-xs-12">
                <select class="form-control form-control-line" required name="type" >
                  @foreach($type as $type)
                  <option value="{{ $type->id }}">{{ $type->jenis_usaha }}</option>
                  @endforeach
                </select>
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