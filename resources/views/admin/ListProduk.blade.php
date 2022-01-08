@extends('layouts.app')
@section('title', 'List Produk')
@section('info')
	<h2>List Produk</h2>
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="index.html">Home</a>
    </li>
    <li class="breadcrumb-item active">
      <strong>List Product</strong>
    </li>
  </ol>
@endsection
@section('content')
<div class="ibox-content m-b-sm border-bottom">
  <div class="row">
		<a href="{{route('addproduk',Auth::user()->id)}}" class="btn btn-primary btn-block" type="button"><li class="fa fa-plus"></li> Tambah Produk Baru</a>
  </div>
</div>
<div class="row">
  <div class="col-lg-12">
  	<div class="ibox">
  	  <div class="ibox-content">
				<table id="example" class="table table-striped table-bordered" style="width:100%">
          <thead>
            <tr>
              <th data-toggle="true">Product Name</th>
              <th data-hide="phone">Kategori</th>
              <th data-hide="all">Description</th>
              <th data-hide="phone">Price</th>
              <th data-hide="phone,tablet" >Quantity</th>
              <th data-hide="phone">Status</th>
              <th class="text-right" data-sort-ignore="true" width="15%">Action</th>
            </tr>
          </thead>
          <tbody>
						@foreach($myProduk as $produk)
							<tr>
								<td>{{$produk->nama_produk}}</td>
								<td>{{$produk->type->jenis_usaha}}</td>
								<td>{{$produk->desc}}</td>
								<td>{{$produk->harga}}</td>
								<td>{{$produk->Quantity}}</td>
								<td>{{$produk->status}}</td>
								<td class="text-center">
									<a href="{{route('editproduk',$produk->id)}}" class="btn btn-warning"><li class="fa fa-edit"></li> Edit</a>
									<a href="{{route('showproduk',$produk->id)}}" class="btn btn-info"><li class="fa fa-edit"></li> Show</a>
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
@endsection