@extends('layouts.app')
@section('title', 'List Produk')
@section('info')
	<h2><li class="fa fa-shopping-bag"></li> Produk</h2>
  <li class="fa fa-home"></li> <a href="{{route('dasboard')}}"> Dasboard</a> /
  <li class="fa fa-shopping-bag"></li> <strong> Produk</strong>
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
            </h2><hr>
            <div class="m-t-md">
             <h2 class="product-main-price"><?php $angka_format = number_format($produk->harga,2,",","."); echo "Rp. ".$angka_format;?> <small class="text-muted"></small> </h2>
            </div>
            <h4>Deskipsi Produk</h4>

            <div class=" text-muted">{!! nl2br(htmlspecialchars($produk->desc)) !!}</div>
            <dl class=" m-t-md">
              <dt>Stok Tersedia</dt>
              <dd>{{$produk->Quantity}}</dd>
            </dl><hr>

            <div>
              <div class="btn-group">
        				<?php $date = Date('j-F-Y'); ?>
								<input type="hidden" value="{{$date}}" class="form-control" name="date" id="date">
								<input type="number" max="{{$produk->Quantity}}" min="0" value="1" class="form-control" name="jumlah" id="jumlah">
								<button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-cart-plus"></i> Add to cart</button>
								{{ csrf_field() }}
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