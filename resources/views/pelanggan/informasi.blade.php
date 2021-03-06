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
      <strong>Keranjang</strong>
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

<div class="wrapper wrapper-content animated fadeInRight">
  <div class="row">
    <div class="col-md-12">
      <div class="ibox">
        <div class="ibox-title">
          <h5>Informasi Pembelian</h5>
    	  </div>
    	  <div class="ibox-content">
          <div class="table-responsive">
            <table class="table shoping-cart-table">
              <tbody>
								@foreach($cart as $cart)
                @if($cart->status_order!='selesai')
            	  <tr>
									<input type="hidden" value="{{$cart->id}}" name="data[{{$loop->index}}][id]">
	                <td width="90">
	                	<div class="cart-product-imitation">
                  		<embed src="{{asset('data_file/'.$cart->produk->image)}}" width="90px" height="90" type="">
	                  </div>
	                </td>
	                <td class="desc">
	                  <h3>
	            	  	  <a href="#" class="text-navy">
	            	        {{$cart->produk->nama_produk}}
	            	      </a>
	                  </h3>
                    <dl class="small m-b-none">
                      <strong style="color:red"> {{$cart->status_order}} </strong><br>
                      <strong> Tanggal Order {{$cart->tanggal_pembelian}} </strong>
           	        </dl>
           	        <div class="m-t-sm">
                      <a href="{{route('detail',[$cart->id_produk,$cart->id_keranjang])}}" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i> Detail</a>
      						  </div>
      						</td>
      						<td><?php $angka_format = number_format($cart->produk->harga,2,",","."); echo "Rp. ".$angka_format;?></td>
                  <td width="65">
                    <input type="text" readonly class="form-control" value="{{$cart->jumlah_produk}}">
    							</td>
    							<td>
                    <h4><?php $angka_format = number_format(($cart->jumlah_produk * $cart->produk->harga),2,",","."); echo "Rp. ".$angka_format;?></h4>
  								</td>
                </tr>
                @endif
								@endforeach
	            </tbody>
    			  </table>
  				</div>
        </div>
        <div class="ibox-content">
          <a href="{{route('dasboard')}}" class="btn btn-success" type="button"><i class="fa fa-arrow-left"></i> Lanjut Belanja</a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection