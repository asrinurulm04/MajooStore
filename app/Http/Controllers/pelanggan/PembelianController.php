<?php

namespace App\Http\Controllers\pelanggan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\produk;
use App\keranjang;
use Auth;
Use Redirect;

class PembelianController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function addPembelian(Request $request, $id){
        $add = new keranjang;
        $add->id_pembeli = Auth::user()->id;
        $add->id_produk = $id;
        $add->jumlah_produk = $request->jumlah;
        $add->tanggal_pembelian = $request->date;
        $add->status = 'keranjang';
        $add->save();

        return redirect::route('cart',$add->id_pembeli);
    }
}
