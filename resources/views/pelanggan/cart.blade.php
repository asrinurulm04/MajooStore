@extends('layouts.app')
@section('title', 'List Produk')
@section('info')
	<h2><li class="fa fa-shopping-cart"></li> Keranjang Order</h2>
  <li class="fa fa-home"></li> <a href="{{route('dasboard')}}"> Dasboard</a> /
  <li class="fa fa-shopping-bag"></li> Produk /
  <li class="fa fa-shopping-cart"></li> <strong> Keranjang</strong>
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

@php $no = 0; @endphp
@if($hitung!=0)
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
                      <a href="{{route('delete',$cart->id_keranjang)}}" class="text-muted"><i class="fa fa-trash"></i> Remove item</a>
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
          <h5>Ekspedisi</h5>
        </div>
        <div class="ibox-content">
          @if($ongkir==NULL)
          <input type="number" max="3" class="form-control" required="required" placeholder="ekspedisi">
          <input type="hidden" id="ekspedisi" class="form-control" value="0"  placeholder="ekspedisi" readonly>
          @elseif($ongkir!=NULL)
          <input type="text" class="form-control" value="{{$ongkir->ekspedisi}} (<?php $angka_format = number_format($ongkir->biaya_ongkir,2,",","."); echo "Rp. ".$angka_format;?>)" required  placeholder="ekspedisi" readonly>
          <input id="ekspedisi" type="hidden" class="form-control" value="{{$ongkir->biaya_ongkir}}"  placeholder="ekspedisi" readonly>
          @endif
          <button class="btn btn-info btn-block btn-sm" data-toggle="modal" data-target="#NW1" type="button"><li class="fa fa-plus"></li> Pilih Ekspedisi</button>
        </div>
      </div>
      <div class="ibox">
        <div class="ibox-title">
          <h5>Cart Summary</h5>
        </div>
        <div class="ibox-content">
          <span> Total Belanja</span>
          <h3 class="font-bold">
            Rp. <input type="text" class="form-control" id="total" name="total" readonly>
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

<!-- Ekspedisi -->
<div id="NW1" class="modal fade" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
      <form class="form-horizontal form-label-left" method="POST" action="{{route('ekspedisi',$cart->id_pembeli)}}">
        <div class="row">
          <div class="col-sm-12 b-r">
            <label>Ekspedisi</label>
            <select name="ekspedisi" required id="ekspedisi" class="form-control">
              <option value="">->Pilih Salah Satu<-</option>
              @foreach($ekspedisi as $ekspedisi)
              <option value="{{$ekspedisi->id}}">{{$ekspedisi->ekspedisi}}- (<?php $angka_format = number_format($ekspedisi->biaya_ongkir,2,",","."); echo "Rp. ".$angka_format;?>)</option>
              @endforeach
            </select>
          </div>
          
          <div class="col-md-12 col-sm-offset-12 col-md-offset-5"><br><br>
            <center><button type="submit" class="btn btn-primary btn-sm"><li class="fa fa-check"></li> Submit</button></center>
            {{ csrf_field() }}
          </div>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Selesai -->
@endif

@endsection
@section('s')
<script>
   $(document).ready(function(){        
    var i      = {{ $no }};
    var total  = 0;
    ekspedisi  = $("#ekspedisi").val();

  	for(y=1;y<=i;y++){
      batch = parseFloat($('#hasil'+y).val());
                
      total   = total + batch;
      jumlah = parseInt(total) + parseInt(ekspedisi);
      
      console.log(jumlah);
      $('#total').val(jumlah);
      console.log(total);
    } 
              
  });
</script>
@endsection