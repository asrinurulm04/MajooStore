@extends('layouts.app')
@section('title', 'List Produk')
@section('info')
	<h2>Tambah Produk Baru</h2>
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="index.html">Dasboard</a>
    </li>
    <li class="breadcrumb-item active">
      <strong>Produk Baru</strong>
    </li>
  </ol>
@endsection
@section('content')
<form class="form-horizontal form-label-left" method="POST" action="{{route('newproduk')}}" enctype="multipart/form-data">
<div class="row">
  <div class="col-lg-12">
    <div class="ibox ">
      <div class="ibox-title">
        <h3><li class="fa fa-file"></li> Produk </h3>
      </div>
      <div class="ibox-content">
        <div class="row">
          <div class="col-sm-12 b-r">
            <div class="form-group row">
              <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">Nama produk*</label>
              <div class="col-md-9 col-sm-8 col-xs-12">
                <input id="nama" class="form-control " type="text" name="nama">
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">Description*</label>
              <div class="col-md-9 col-sm-8 col-xs-12">
								<textarea name="desc" id="desc" rows="2" class="form-control"></textarea>
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">Jumlah stok*</label>
              <div class="col-md-9 col-sm-8 col-xs-12">
                <input id="jumlah" class="form-control " required value="" type="text" name="jumlah" >
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">Status*</label>
              <div class="col-md-9 col-sm-8 col-xs-12">
                <select class="form-control form-control-line" name="status" >
									<option value="active">Active</option>
									<option value="active">Inactive</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">Gambar Produk*</label>
              <div class="col-md-9 col-sm-8 col-xs-12">
                <input id="image" class="form-control " required value="" type="file" name="image" >
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