@extends('layouts.app')
@section('title', 'Dasboard')
@section('info')
	<h2><li class="fa fa-home"></li> Dasboard</h2>
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


<center>
  <div class="form-group row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        @foreach($type as $type)
        <a href="{{route('dasboard2',$type->id)}}" class="btn btn-primary btn-sm" type="button">{{$type->jenis_usaha}}</a>
        @endforeach
    </div>
  </div>
</center>

<div class="wrapper wrapper-content animated fadeInRight">
  <div class="row">
		@foreach($produk as $produk)
    <div class="col-md-3" id="show_product">
      <div class="ibox">
        <div class="ibox-content product-box">
          <div class="product-imitation">
            <embed src="{{asset('data_file/'.$produk->image)}}" width="190px" height="190" type="">
        	</div>
        	<div class="product-desc">
            <span class="product-price"><?php $angka_format = number_format($produk->harga,2,",","."); echo "Rp. ".$angka_format;?>
            </span>
            <small class="text-muted">Kategori</small>
            <a href="#" class="product-name">{{$produk->nama_produk}} </a>
            <div class="small m-t-xs">
              {{$produk->type->jenis_usaha}}
            </div>
      	    <div class="m-t text-righ">
              <a href="{{route('showproduk',$produk->id)}}" class="btn btn-xs btn-outline btn-primary">Info <i class="fa fa-long-arrow-right"></i> </a>
            </div>
          </div>
  	    </div>
  	  </div>
  	</div>
		@endforeach
  </div>
</div>
@endsection
@section('s')
<script>
	$(document).ready(function(){
		$("#type").change(function(){
			var myId = $(this).val()
      console.log(myId);
			$.ajax({
        url: '{{URL::to('produk')}}/'+myId,
				method: "POST",
				success: function(data){
					$("#show_product").html(data);
				}
			})
		})
	})

</script>
@endsection