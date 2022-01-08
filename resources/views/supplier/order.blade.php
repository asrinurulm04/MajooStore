@extends('layouts.app')
@section('title', 'List Produk')
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

<!-- filter data -->
<div class="ibox-content m-b-sm border-bottom">
  <div>
    <form id="clear">
    <div class="row">
      <div class="col-sm-4">
        <div class="form-group" id="filter_col1" data-column="3">
          <label>Bulan Order</label>
          <select name="status" class="form-control column_filter" id="col3_filter" >
            <option disabled selected>-->Select One<--</option>
            <?php
              $bulan=array("January","February","March","April","May","June","july","August","September","October","November","December");
              $jlh_bln=count($bulan);
              for($c=0; $c<$jlh_bln; $c+=1){ echo"<option> $bulan[$c] </option>"; }
            ?>
          </select>
        </div>
      </div>  
      <div class="col-sm-5">
        <div class="form-group" id="filter_col1" data-column="4">
          <label>Status</label>
          <select name="brand" class="form-control column_filter" id="col4_filter" >
            <option disabled selected>-->Select One<--</option>
            <option>New Order</option>
            <option>Proses</option>
            <option>Sedang Di Kirim</option>
            <option>Selesai</option>
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
<div class="row">
  <div class="col-lg-12">
    <div class="ibox">
      <div class="ibox-content">
        <table id="example" class="table ex table-striped table-bordered" style="width:100%">
          <thead>
            <tr>
              <th class="text-center">Customer</th>
              <th class="text-center">Total Biaya</th>
              <th class="text-center" width="10%">Jumlah Order</th>
              <th class="text-center">Tanggal Order</th>
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
              <td>{{$order->tanggal_pembelian}}</td>
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