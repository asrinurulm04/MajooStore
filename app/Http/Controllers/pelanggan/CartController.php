<?php

namespace App\Http\Controllers\pelanggan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\produk;
use App\keranjang;
use Auth;
use Redirect;

class CartController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function cart($id){
        $cart = keranjang::where('id_pembeli',$id)->where('status_order','keranjang')->get();
        $hitung = keranjang::where('id_pembeli',$id)->where('status_order','keranjang')->count();
        return view('pelanggan.cart')->with([
            'cart' => $cart,
            'hitung' => $hitung
        ]);
    }

    public function delete($id){
        $cart = keranjang::where('id',$id)->delete();

        return redirect::back();
    }

    public function checkout(Request $request){
        $data = $request->input('data');
        foreach($data as $data){
            $cart = keranjang::where('id',$data['id'])->update([
                'status_order' => 'order'
            ]);
        }

        return redirect::route('dasboard');
    }
}
