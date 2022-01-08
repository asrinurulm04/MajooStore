<?php

namespace App\Http\Controllers\pelanggan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\keranjang;
use App\produk;
use Auth;
use Redirect;

class informasiController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function info($id){
        $cart = keranjang::where('id_pembeli',$id)->where('status_order','!=','keranjang')->get();
        return view('pelanggan.informasi')->with([
            'cart' => $cart
        ]);
    }

    public function infoDetail($id,$keranjang){
        $cart = keranjang::where('id',$keranjang)->first();
        $produk = produk::where('id',$id)->first();
        return view('pelanggan.detail')->with([
            'produk' => $produk,
            'cart' => $cart
        ]);
    }
}
