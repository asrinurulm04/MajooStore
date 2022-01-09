@extends('layouts.app')
@section('title', 'List Produk')
@section('info')
	<h2><li class="fa fa-file"></li> Laporan Penjualan</h2>
  <li class="fa fa-home"></li> <a href="{{route('dasboard')}}"> Dasboard</a> /
  <li class="fa fa-file"></li> <strong> Laporant</strong>
@endsection
@section('content')

@if(session('status'))
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
<div class="col-md-12">
<!-- filter data -->
<div class="row">
  <div class="col-lg-12">
  	<div class="ibox">
  	  <div class="ibox-content">
				<table id="example" class="table ex table-striped table-bordered" style="width:100%">
          <thead>
            <tr>
              <th class="text-center">Nama Produk</th>
              <th class="text-center">Kategori</th>
              <th class="text-center">Jumlah Terjual</th>
              <th class="text-center">Harga satuan</th>
              <th class="text-center">Total</th>
            </tr>
          </thead>
          <tbody>
						@foreach($myProduk as $produk)
							<tr>
								<td>{{$produk->nama_produk}}</td>
								<td>{{$produk->type->jenis_usaha}}</td>
								<td>{{$produk->jumlah_terjual}}</td>
								<td class="text-right"><?php $angka_format = number_format($produk->harga,2,",","."); echo "Rp. ".$angka_format;?></td>
								<td class="text-right"><?php $angka_format = number_format(($produk->harga*$produk->jumlah_terjual),2,",","."); echo "Rp. ".$angka_format;?></td>
							</tr>
						@endforeach
          </tbody>
        </table>
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
<script>
  function filterGlobal () {
    $('#ex').DataTable().search(
      $('#global_filter').val(),
    ).draw();
  }
    
  function filterColumn ( i ) {
    $('.ex').DataTable().column( i ).search(
      $('#col'+i+'_filter').val()
    ).draw();
  }
    
  $(document).ready(function() {
    $('.ex').DataTable();    
    $('input.global_filter').on( 'keyup click', function () {
      filterGlobal();
    });
    $('input.column_filter').on( 'keyup click', function () {
      filterColumn( $(this).parents('div').attr('data-column') );
    } );
  });
  $('select.column_filter').on('change', function () {
    filterColumn( $(this).parents('div').attr('data-column') );
  } );
</script>
@endsection