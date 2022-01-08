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
<div class="wrapper wrapper-content animated fadeInRight">
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
                    <input type="text" class="form-control" value="{{$cart->jumlah_produk}}">
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
          <button class="btn btn-primary float-right"><i class="fa fa fa-shopping-cart"></i> Checkout</button>
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
            <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-shopping-cart"></i> Checkout</a>
            <a href="#" class="btn btn-white btn-sm"> Cancel</a>
            </div>
          </div>
        </div>
      </div>

      <div class="ibox">
      	<div class="ibox-title">
        	<h5>Support</h5>
      	</div>
      	<div class="ibox-content text-center">
        	<h3><i class="fa fa-phone"></i> +43 100 783 001</h3>
        	<span class="small">
        	  Please contact with us if you have any questions. We are avalible 24h.
        	</span>
      	</div>
      </div>
      <div class="ibox">
        <div class="ibox-content">
          <p class="font-bold">
          Other products you may be interested
          </p><hr/>
          <div>
            <a href="#" class="product-name"> Product 1</a>
            <div class="small m-t-xs">
              Many desktop publishing packages and web page editors now.
            </div>
            <div class="m-t text-righ">
              a href="#" class="btn btn-xs btn-outline btn-primary">Info <i class="fa fa-long-arrow-right"></i> </a>
            </div>
          </div><hr/>
          <div>
            <a href="#" class="product-name"> Product 2</a>
            <div class="small m-t-xs">
              Many desktop publishing packages and web page editors now.
            </div>
            <div class="m-t text-righ">
              a href="#" class="btn btn-xs btn-outline btn-primary">Info <i class="fa fa-long-arrow-right"></i> </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection