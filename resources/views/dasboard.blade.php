@extends('layouts.app')
@section('title', 'Dasboard')
@section('info')
	<h2>Dasboard</h2>
	@if(Auth::user()->role_id=='2')
		@if($toko!='1')
		<div class="alert alert-danger alert-dismissable">
				<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
				Silahkan Lengkapi Informasi Toko Anda. <a class="alert-link" href="{{route('profile',Auth::user()->id)}}"> "Klik Disini"</a>.
		</div>
		@endif
	@endif
@endsection
@section('content')
<div class="wrapper wrapper-content animated fadeInRight">
  <div class="row">
		@foreach($produk as $produk)
    <div class="col-md-3">
      <div class="ibox">
        <div class="ibox-content product-box">
          <div class="product-imitation">
            <embed src="{{asset('data_file/'.$produk->image)}}" width="190px" height="190" type="">
        	</div>
        	<div class="product-desc">
            <span class="product-price">
              Rp.{{$produk->harga}}
            </span>
            <small class="text-muted">Kategori</small>
            <a href="#" class="product-name"> {{$produk->type->jenis_usaha}}</a>
            <div class="small m-t-xs">
              {{$produk->desc}}
            </div>
      	    <div class="m-t text-righ">
              <a href="{{route('showproduk',Auth::user()->id)}}" class="btn btn-xs btn-outline btn-primary">Info <i class="fa fa-long-arrow-right"></i> </a>
            </div>
          </div>
  	    </div>
  	  </div>
  	</div>
		@endforeach
  </div>
</div>
@endsection