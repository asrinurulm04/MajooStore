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
                @php $no = 0; @endphp
								@foreach($cart as $cart)
                @php ++$no; @endphp
            	  <tr>
									<input type="hidden" value="{{$cart->id}}" name="data[{{$loop->index}}][id]">
									<input type="hidden" value="{{$cart->id_produk}}" name="produk[{{$loop->index}}][id_produk]">
									<input type="hidden" value="{{$cart->jumlah_produk}}" name="produk[{{$loop->index}}][jumlah_produk]">
	                <td width="90px">
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
      						<td width="20%"><?php $angka_format = number_format($cart->produk->harga,2,",","."); echo "Rp. ".$angka_format;?></td>
                  <td width="65px">
                    <input type="text" readonly class="form-control" value="{{$cart->jumlah_produk}}">
    							</td>
    							<td width="20%">
                      <input type="hidden" value="{{$cart->jumlah_produk * $cart->produk->harga}}" name="hasil" id="hasil{{$no}}">
                      <?php $angka_format = number_format(($cart->jumlah_produk * $cart->produk->harga),2,",","."); echo "Rp. ".$angka_format;?>
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
          <span> Total Belanja</span>
          <h3 class="font-bold">
            Rp. <input type="text" id="total" name="total" readonly>
          </h3><hr/>
          <span class="text-muted small">
            *Sudah termasuk Pajak
          </span>
          <div class="m-t-sm">
            <div class="btn-group">
            <button class="btn btn-primary btn-sm" type="submit"><li class="fa fa-shopping-cart"></li> Checkout</button>
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
@section('s')
<script>
   $(document).ready(function(){        
    var i = {{ $no }};
    var total  = 0;

  	for(y=1;y<=i;y++){
      batch = parseFloat($('#hasil'+y).val());
      console.log(batch);
                
      total   = total + batch;
      $('#total').val(total);
      console.log(total);
    } 
              
  });
</script>
@endsection