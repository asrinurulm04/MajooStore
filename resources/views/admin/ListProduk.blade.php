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
								<td>{{$produk->harga}}</td>
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
@endsection