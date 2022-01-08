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
        $cek = keranjang::where('id_pembeli',Auth::user()->id)->where('id_produk',$id)->where('status_order','keranjang')->count();
        if($cek==0){
            $add = new keranjang;
            $add->jumlah_produk = $request->jumlah;
            $add->id_produk = $id;
            $add->id_pembeli = Auth::user()->id;
            $add->tanggal_pembelian = $request->date;
            $add->status_order = 'keranjang';
            $add->save();
        }elseif($cek!=0){
            $add = keranjang::where('id_pembeli',Auth::user()->id)->where('id_produk',$id)->where('status_order','keranjang')->first();
            $produk = produk::where('id',$id)->first();
            $edit = keranjang::where('id_pembeli',Auth::user()->id)->where('id_produk',$id)->where('status_order','keranjang')->where('jumlah_produk','<',$produk->Quantity)->update([
                'jumlah_produk' => $add->jumlah_produk + $request->jumlah
            ]);
        }

        return redirect::route('cart',$add->id_pembeli)->with('status', 'Barang di tambahkan ke keranjang!');
    }
}
