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
             <h2 class="product-main-price">Rp. {{$cart->jumlah_produk * $cart->produk->harga}} <small class="text-muted">(Total Belanja)</small> </h2>
            </div><hr>
            <h4>Status Order</h4>

            <div class=" text-muted">
              @if($cart->status_order=='order')
              <strong style="color:blue">Order</strong> <br> Sedang Di Proses Penjual <br> Produk Sedang di kirim <br> Selesai
              @elseif($cart->status_order=='proses')
              <strong style="color:blue">Order</strong> <br> <strong style="color:blue">Sedang Di Proses Penjual</strong> <br> Produk Sedang di kirim <br> Selesai
              @elseif($cart->status_order=='kirim')
              <strong style="color:blue">Order</strong> <br> <strong style="color:blue">Sedang Di Proses Penjual</strong> <br> <strong style="color:blue">Produk Sedang di kirim</strong> <br> Selesai
              @elseif($cart->status_order=='kirim')
              <strong style="color:blue">Order</strong> <br> <strong style="color:blue">Sedang Di Proses Penjual</strong> <br> <strong style="color:blue">Produk Sedang di kirim</strong> <br> <strong style="color:blue">Selesai</strong>
              @endif
            </div>
            <dl class=" m-t-md">
              <dt>Tanggal Order : {{$cart->tanggal_pembelian}}</dt>
              <dt>Jumlah Order : {{$cart->jumlah_produk}}</dt>
              <dt>Informasi Pembeli : </dt>
              <div class=" text-muted">
                <table>
                  <tr><td><li></li></td><td>Nama Pembeli</td><td>:</td><td>{{$cart->users->name}}</td></tr>
                  <tr><td><li></li></td><td>Alamat Pembeli</td><td>:</td><td>{{$cart->users->alamat}}</td></tr>
                  <tr><td><li></li></td><td>Kontak Pembeli</td><td>:</td><td>{{$cart->users->no_telp}}</td></tr>
                </table>
              </div>
            </dl><hr>

            <div>
              <div class="btn-group">
                <a href="{{route('order',auth()->user()->id)}}" class="btn btn-danger btn-sm" type="button"><li class="fa fa-arrow-circle-left"></li> Kembali</a>
                @if($cart->status_order=='order')
                <a href="{{route('kirimOrder',$cart->id_keranjang)}}" class="btn btn-primary btn-sm" type="button"><li class="fa fa-paper-plane"></li> Kirim Orderan</a>
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection