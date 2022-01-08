<?php

namespace App\Http\Controllers\supplier;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\keranjang;
use App\produk;
use Auth;
use Redirect;

class OrderController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function order($id){
        $order = Keranjang::join('produk','produk.id','keranjang.id_produk')->where('status_order','!=','keranjang')->where('id_pemilik',Auth::user()->id)->get();
        return view('supplier.order')->with([
            'order' => $order
        ]);
    }

    public function detailOrder($id,$keranjang){
        $produk = produk::where('id',$id)->first();
        $order = keranjang::where('id_keranjang',$keranjang)->first();
        return view('supplier.detail_order')->with([
            'cart' => $order,
            'produk' => $produk
        ]);
    }

    public function kirimOrder($id_keranjang){
        $order = keranjang::where('id_keranjang',$id_keranjang)->update([
            'status_order' => 'kirim'
        ]);

        return redirect::route('order',Auth::user()->id);
    }
}
