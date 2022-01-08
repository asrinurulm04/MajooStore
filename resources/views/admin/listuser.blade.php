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
<div class="row">
  <div class="col-lg-12">
  	<div class="ibox">
  	  <div class="ibox-content">
				<table id="example" class="table table-striped table-bordered" style="width:100%">
          <thead>
            <tr>
              <th class="text-center" width="5%">id</th>
              <th class="text-center">Name</th>
              <th class="text-center">User Name</th>
              <th class="text-center">Phone</th>
              <th class="text-center">Role</th>
              <th class="text-center">Status</th>
            </tr>
          </thead>
          <tbody>
						@foreach($user as $user)
							<tr>
								<td class="text-center">{{$user->id}}</td>
								<td>{{$user->name}}</td>
								<td>{{$user->username}}</td>
								<td>{{$user->no_telp}}</td>
								<td>{{$user->Role->namaRule}}</td>
								<td>{{$user->status}}</td>
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