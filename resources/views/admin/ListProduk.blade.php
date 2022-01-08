@extends('layouts.app')
@section('title', 'List Produk')
@section('info')
	<h2><li class="fa fa-shopping-bag"></li> List Produk</h2>
  <li class="fa fa-home"></li> <a href="{{route('dasboard')}}"> Dasboard</a> /
  <li class="fa fa-shopping-bag"></li> <strong> List Product</strong>
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
<div class="ibox-content m-b-sm border-bottom">
  <div>
    <form id="clear">
    <div class="row">
      <div class="col-sm-4">
        <div class="form-group" id="filter_col1" data-column="1">
          <label>Kategori</label>
          <select name="status" class="form-control column_filter" id="col1_filter" >
            <option disabled selected>-->Select One<--</option>
            @foreach($type as $type)
            <option>{{$type->jenis_usaha}}</option>
            @endforeach
          </select>
        </div>
      </div>  
      <div class="col-sm-5">
        <div class="form-group" id="filter_col1" data-column="5">
          <label>Status</label>
          <select name="brand" class="form-control column_filter" id="col5_filter" >
            <option disabled selected>-->Select One<--</option>
            <option>active</option>
            <option>inctive</option>
          </select>
        </div>
      </div>
      <div class="col-sm-2">
        <div class="form-group" id="filter_col1" data-column="5">
          <label class="text-center">refresh</label>  <br>  
          <a href="" class="btn btn-info btn-sm"><li class="fa fa-refresh"></li></a>
        </div>
      </div>
    </div>  
    </form>
    </div>
  </div>
</div>
<div class="ibox-content m-b-sm border-bottom">
  <div class="row">
		<a href="{{route('addproduk',Auth::user()->id)}}" class="btn btn-primary btn-block" type="button"><li class="fa fa-plus"></li> Tambah Produk Baru</a>
  </div>
</div>
<div class="row">
  <div class="col-lg-12">
  	<div class="ibox">
  	  <div class="ibox-content">
				<table id="example" class="table ex table-striped table-bordered" style="width:100%">
          <thead>
            <tr>
              <th class="text-center">Product Name</th>
              <th class="text-center">Kategori</th>
              <th class="text-center">Description</th>
              <th class="text-center">Price</th>
              <th class="text-center">Quantity</th>
              <th class="text-center">Status</th>
              <th class="text-center" data-sort-ignore="true" width="15%">Action</th>
            </tr>
          </thead>
          <tbody>
						@foreach($myProduk as $produk)
							<tr>
								<td>{{$produk->nama_produk}}</td>
								<td>{{$produk->type->jenis_usaha}}</td>
								<td>{{$produk->desc}}</td>
								<td class="text-right"><?php $angka_format = number_format($produk->harga,2,",","."); echo "Rp. ".$angka_format;?></td>
								<td class="text-center">
                  @if($produk->Quantity<=9)
                  <span class="label label-danger">{{$produk->Quantity}}</span>
                  @elseif($produk->Quantity>=10)
                  <span class="label label-success">{{$produk->Quantity}}</span>
                  @endif
                </td>
								<td>{{$produk->status}}</td>
								<td class="text-center">
									<a href="{{route('editproduk',$produk->id)}}" class="btn btn-warning"><li class="fa fa-edit"></li> Edit</a>
									<a href="{{route('detailproduk',$produk->id)}}" class="btn btn-info"><li class="fa fa-edit"></li> Show</a>
								</td>
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