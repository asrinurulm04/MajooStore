@extends('layouts.app')
@section('title', 'List Produk')
@section('info')
	<h2>Product edit</h2>
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="index.html">Home</a>
    </li>
    <li class="breadcrumb-item">
      <a>E-commerce</a>
    </li>
    <li class="breadcrumb-item active">
      <strong>Product edit</strong>
    </li>
  </ol>
@endsection
@section('content')
<div class="row">
  <div class="col-lg-12">
    <div class="ibox product-detail">
      <div class="ibox-content">
				<form class="form-horizontal form-label-left" method="POST" action="{{route('addPembelian',$produk->id)}}" enctype="multipart/form-data">
        <div class="row">
          <div class="col-md-5">
            <div class="product-images">
              <div>
                <div class="image-imitation">
                  <embed src="{{asset('data_file/'.$produk->image)}}" width="390px" height="390" type="">
                </div>
              </div>
            </div>
        	</div>
        	<div class="col-md-7">
            <h2 class="font-bold m-b-xs">
              {{$produk->nama_produk}}
            </h2>
            <div class="m-t-md">
             <h2 class="product-main-price">Rp. {{$produk->harga}} <small class="text-muted">Exclude Tax</small> </h2>
            </div><hr>
            <h4>Deskipsi Produk</h4>

            <div class="small text-muted">
              {{$produk->desc}}
            </div>
            <dl class="small m-t-md">
              <dt>Stok Tersedia</dt>
              <dd>{{$produk->Quantity}}</dd>
            </dl><hr>

            <div>
              <div class="btn-group">
        				<?php $date = Date('j-F-Y'); ?>
								<input type="hidden" value="{{$date}}" class="form-control" name="date" id="date">
								<input type="number" max="{{$produk->Quantity}}" value="1" class="form-control" name="jumlah" id="jumlah">
								<button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-cart-plus"></i> Add to cart</button>
								{{ csrf_field() }}
                <button class="btn btn-dark btn-sm"><i class="fa fa-envelope"></i> Contact with author </button>
              </div>
            </div>
          </div>
        </div>
				</form>
      </div>
    </div>
  </div>
</div>
@endsection