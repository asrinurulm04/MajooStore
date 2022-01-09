<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Toko;
use App\produk;
use App\type;
use App\keranjang;
use Auth;

class DasboardController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(){
        $type = type::all();
        $produk = produk::where('Quantity','!=','0')->get();
        $toko = Toko::where('pemilik',Auth::user()->id)->count();
        $cart = Keranjang::join('produk','produk.id','keranjang.id_produk')->where('status_order','order')->where('id_pemilik',Auth::user()->id)->count();
        return view('dasboard')->with([
            'toko' => $toko,
            'cart' => $cart,
            'produk' => $produk,
            'type' => $type
        ]);
    }

    public function index2($data){
        $type = type::all();
        $produk = produk::where('Quantity','!=','0')->where('id_kategori',$data)->get();
        $toko = Toko::where('pemilik',Auth::user()->id)->count();
        return view('dasboard')->with([
            'toko' => $toko,
            'produk' => $produk,
            'type' => $type
        ]);
    }
}
