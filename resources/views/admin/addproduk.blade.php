@extends('layouts.app')
@section('title', 'List Produk')
@section('info')
	<h2>Tambah Produk Baru</h2>
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="index.html">Dasboard</a>
    </li>
    <li class="breadcrumb-item active">
      <strong>Produk Baru</strong>
    </li>
  </ol>
@endsection
@section('content')
@if(count($errors) > 0)
<div class="alert alert-danger">
  <strong>Whoops!</strong> There were some problems with your input.<br><br>
  <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif

<style>
    .progress { position:relative; width:100%; }
    .bar { background-color: #b5076f; width:0%; height:20px; }
    .percent { position:absolute; display:inline-block; left:50%; color: #040608;}
</style>

<form id="fileUploadForm"  class="form-horizontal form-label-left" method="POST" action="{{route('newproduk')}}" enctype="multipart/form-data">
<div class="row">
  <div class="col-lg-12">
    <div class="ibox ">
      <div class="ibox-title">
        <h3><li class="fa fa-file"></li> Produk </h3>
      </div>
      <div class="ibox-content">
        <div class="row">
          <div class="col-sm-12 b-r">
            <div class="form-group row">
              <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">Nama produk*</label>
              <div class="col-md-9 col-sm-8 col-xs-12">
                <input id="nama_produk" class="form-control" required type="text" name="nama_produk">
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">Harga*</label>
              <div class="col-md-9 col-sm-8 col-xs-12">
                <input id="harga" class="form-control " required type="number" name="harga">
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">Description*</label>
              <div class="col-md-9 col-sm-8 col-xs-12">
								<textarea name="desc" id="desc" rows="2" required class="form-control"></textarea>
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">Jumlah stok*</label>
              <div class="col-md-9 col-sm-8 col-xs-12">
                <input id="jumlah" class="form-control " required value="" type="number" name="jumlah" >
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">Status*</label>
              <div class="col-md-9 col-sm-8 col-xs-12">
                <select class="form-control form-control-line" name="status" >
									<option value="active">Active</option>
									<option value="active">Inactive</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">Kategori Produk*</label>
              <div class="col-md-9 col-sm-8 col-xs-12">
                <select class="form-control form-control-line" required name="type" id="type">
                  @foreach($type as $type)
                  <option value="{{ $type->id }}">{{ $type->jenis_usaha }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="control-label col-md-2 col-sm-3 col-xs-12" for="first-name">Gambar Produk*</label>
              <div class="col-md-9 col-sm-8 col-xs-12">
                <input type="file" name="filename" required class="form-control">
              </div>
            </div>
            <div class="progress">
              <div class="bar"></div >
              <div class="percent">0%</div >
            </div>
            <br>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-12">
    <div class="ibox ">
      <div class="ibox-content">
        <div class="col-md-12 col-sm-offset-5 col-md-offset-5 text-center">
          <button type="reset" class="btn btn-warning btn-sm"><li class="fa fa-repeat"></li> Reset</button>
          <button type="submit" class="btn btn-success btn-sm"><li class="fa fa-check"></li> Submit</button>
          {{ csrf_field() }}
        </div
      </div>
    </div>
  </div>
</div>
</form>
@endsection
@section('s')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
      // Get Pangan
      $('#type').on('change', function(){
        var myId = $(this).val();
          if(myId){
            $.ajax({
              url: '{{URL::to('kategori')}}/'+myId,
              type: "GET",
              dataType: "json",
              beforeSend: function(){ 
                  $('#loader').css("visibility", "visible");
              },

              success:function(data){
                $('#subkategori').empty();
                $.each(data, function(key, value){
                  console.log(data);
                  $('#subkategori').append('<option value="'+ key +'">' + value + '</option>');
                });
              },
              complete: function(){
                $('#loader').css("visibility","hidden");
              }
            });
          }
          else{
            $('#subkategori').empty();
          }
      });

  });
</script>
<script type="text/javascript">
    var SITEURL = "{{URL('/')}}";
    $(function() {
         $(document).ready(function()
         {
            var bar = $('.bar');
            var percent = $('.percent');
 
      $('form').ajaxForm({
        beforeSend: function() {
            var percentVal = '0%';
            bar.width(percentVal)
            percent.html(percentVal);
        },
        uploadProgress: function(event, position, total, percentComplete) {
            var percentVal = percentComplete + '%';
            bar.width(percentVal)
            percent.html(percentVal);
        },
        complete: function(xhr) {
            alert('File Has Been Uploaded Successfully');
            window.location.href = SITEURL +"/"+"dasboard";
        }
      });
   }); 
 });
</script>
@endsection