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
        $jumlah = produk::where('id',$id)->first();
        if($cek==0){
            $add = new keranjang;
            $add->jumlah_produk = $request->jumlah;
            $add->id_produk = $id;
            $add->id_pembeli = Auth::user()->id;
            $add->tanggal_pembelian = $request->date;
            $add->status_order = 'keranjang';
            $add->save();

            $produk = produk::where('id',$id)->first();
            $produk->jumlah_terjual = $jumlah->jumlah_terjual + $request->jumlah;
            $produk->save();
        }elseif($cek!=0){
            $add = keranjang::where('id_pembeli',Auth::user()->id)->where('id_produk',$id)->where('status_order','keranjang')->first();
            $produk = produk::where('id',$id)->first();
            $edit = keranjang::where('id_pembeli',Auth::user()->id)->where('id_produk',$id)->where('status_order','keranjang')->where('jumlah_produk','<',$produk->Quantity)->update([
                'jumlah_produk' => $add->jumlah_produk + $request->jumlah
            ]);
            $tambah_jual = produk::where('id',$id)->update([
                'jumlah_terjual' => $produk->jumlah_terjual + $request->jumlah
            ]);
        }

        return redirect::route('cart',$add->id_pembeli)->with('status', 'Barang di tambahkan ke keranjang!');
    }
}
