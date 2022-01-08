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
	<form class="form-horizontal form-label-left" method="POST" action="{{route('checkout')}}">
  <div class="row">
    <div class="col-md-9">
      <div class="ibox">
        <div class="ibox-title">
          <span class="float-right">(<strong>{{$hitung}}</strong>) items</span>
          <h5>Items in your cart</h5>
    	  </div>
    	  <div class="ibox-content">
          <div class="table-responsive">
            <table class="table shoping-cart-table">
              <tbody>
								@foreach($cart as $cart)
            	  <tr>
									<input type="hidden" value="{{$cart->id}}" name="data[{{$loop->index}}][id]">
									<input type="hidden" value="{{$cart->id_produk}}" name="produk[{{$loop->index}}][id_produk]">
									<input type="hidden" value="{{$cart->jumlah_produk}}" name="produk[{{$loop->index}}][jumlah_produk]">
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
                      @if($cart->produk->Quantity <=5)<strong style="color:red">Tersisa {{$cart->produk->Quantity}} Buah</strong>@endif
           	        </dl>
           	        <div class="m-t-sm">
                      <a href="{{route('delete',$cart->id)}}" class="text-muted"><i class="fa fa-trash"></i> Remove item</a>
      						  </div>
      						</td>
      						<td>
      						  Rp.{{$cart->produk->harga}}
      						</td>
                  <td width="65">
                    <input type="text" readonly class="form-control" value="{{$cart->jumlah_produk}}">
    							</td>
    							<td>
                    <h4>
                    Rp.{{$cart->jumlah_produk * $cart->produk->harga}}
  								  </h4>
  								</td>
                </tr>
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
    <div class="col-md-3">
      <div class="ibox">
        <div class="ibox-title">
          <h5>Cart Summary</h5>
        </div>
        <div class="ibox-content">
          <span>
            Total
          </span>
          <h2 class="font-bold">
            $390,00
          </h2><hr/>
          <span class="text-muted small">
            *For United States, France and Germany applicable sales tax will be applied
          </span>
          <div class="m-t-sm">
            <div class="btn-group">
            <button class="btn btn-primary btn-sm" type="submit"><li class="fa fa-hopping-cart"></li> Checkout</button>
            {{ csrf_field() }}
            </div>
          </div>
        </div>
      </div>
    </div>
		</form>
  </div>
</div>
@endsection