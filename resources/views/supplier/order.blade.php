@extends('layouts.app')
@section('title', 'List Produk')
@section('content')
<div class="ibox-content m-b-sm border-bottom">
  <div class="row">
    <div class="col-sm-4">
      <div class="form-group">
        <label class="col-form-label" for="date_added">Date added</label>
        <div class="input-group date">
          <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input id="date_added" type="text" class="form-control" value="03/04/2014">
        </div>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="form-group">
        <label class="col-form-label" for="date_modified">Date modified</label>
        <div class="input-group date">
          <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input id="date_modified" type="text" class="form-control" value="03/06/2014">
        </div>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="form-group">
        <label class="col-form-label" for="amount">Amount</label>
        <input type="text" id="amount" name="amount" value="" placeholder="Amount" class="form-control">
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-lg-12">
    <div class="ibox">
      <div class="ibox-content">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
          <thead>
            <tr>
              <th class="text-center">Customer</th>
              <th class="text-center">Total Biaya</th>
              <th class="text-center" width="10%">Jumlah Order</th>
              <th class="text-center">Date added</th>
              <th class="text-center">Status</th>
              <th class="text-center" width="5%">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($order as $order)
            <tr>
              <td>{{$order->users->name}}</td>
              <td>{{$order->jumlah_produk * $order->produk->harga}}</td>
              <td>{{$order->jumlah_produk}}</td>
              <td>{{$order->id_keranjang}}</td>
              <td>
                @if($order->status_order=='order')
                  <span class="label label-danger">New Order</span>
                @elseif($order->status_order=='proses')
                  <span class="label label-primary">Proses</span>
                @elseif($order->status_order=='kirim')
                  <span class="label label-info">Sedang Di Kirim</span>
                @elseif($order->status_order=='selesai')
                  <span class="label label-success">Selesai</span>
                @endif
              </td>
              <td class="text-right">
                <div class="btn-group">
                  <a href="{{route('detailOrder',[$order->id,$order->id_keranjang])}}" class="btn-primary btn btn-sm dim" type="button">View</a>
                </div>
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