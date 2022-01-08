@extends('layouts.app')
@section('title', 'List Produk')
@section('info')
	<h2>Tambah Produk Baru</h2>
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="index.html">Dasboard</a>
    </li>
    <li class="breadcrumb-item active">
      <strong>Edit Produk</strong>
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

<form class="form-horizontal form-label-left" method="POST" action="{{route('editdataproduk',$produk->id)}}" enctype="multipart/form-data">
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
                <input id="nama" class="form-control " value="{{$produk->nama_produk }}" type="text" name="nama">
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">Harga*</label>
              <div class="col-md-9 col-sm-8 col-xs-12">
                <input id="harga" class="form-control " value="{{$produk->harga}}" type="number" name="harga">
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">Description*</label>
              <div class="col-md-9 col-sm-8 col-xs-12">
								<textarea name="desc" id="desc" rows="2" value="{{$produk->desc}}" class="form-control">{{$produk->desc}}</textarea>
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">Jumlah stok*</label>
              <div class="col-md-9 col-sm-8 col-xs-12">
                <input id="jumlah" class="form-control " value="{{$produk->Quantity}}" required value="" type="number" name="jumlah" >
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">Status*</label>
              <div class="col-md-9 col-sm-8 col-xs-12">
                <select class="form-control form-control-line" name="status" >
									<option value="{{$produk->status}}">{{$produk->status}}</option>
									<option value="active">Active</option>
									<option value="Inactive">Inactive</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">Kategori Produk*</label>
              <div class="col-md-9 col-sm-8 col-xs-12">
                <select class="form-control form-control-line" required name="type" >
									<option value="{{$produk->id_kategori}}">{{$produk->type->jenis_usaha}}</option>
                  @foreach($type as $type)
                  <option value="{{ $type->id }}">{{ $type->jenis_usaha }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">Gambar Produk*</label>
              <div class="col-md-9 col-sm-8 col-xs-12">
                <input type="file" name="filename" required class="form-control">
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