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
             <h2 class="product-main-price">Rp. {{$produk->harga}} <small class="text-muted"></small> </h2>
            </div><hr>
            <h4>Data Penjualan</h4>

            <div class=" text-muted">
              <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                  <tr>
                    <th>Jumlah Order</th>
                    <th>Tanggal Order</th>
                    <th>Status Order</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($cart as $cart)
                  <tr>
                    <td>{{$cart->jumlah_produk}}</td>
                    <td>{{$cart->tanggal_pembelian}}</td>
                    <td>{{$cart->status_order}}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <dl class=" m-t-md">
            </dl><hr>

            <div>
              <div class="btn-group">
                <a href="{{route('listProduk',auth()->user()->id)}}" class="btn btn-danger btn-sm" type="button"><li class="fa fa-arrow-circle-left"></li> Kembali</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('s')
<script>
	$(document).ready(function() {
    $('#example').DataTable();
} );
</script>
@endsection