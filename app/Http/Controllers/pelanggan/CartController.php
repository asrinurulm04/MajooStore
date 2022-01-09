<?php

namespace App\Http\Controllers\pelanggan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\produk;
use App\keranjang;
use App\User;
use App\ekspedisi;
use Auth;
use Redirect;

class CartController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function cart($id){
        $ekspedisi = ekspedisi::all();
        $ongkir = keranjang::join('ekspedisi','ekspedisi.id','keranjang.id_ekspedisi')->where('id_pembeli',$id)->where('status_order','keranjang')->select(['ekspedisi','biaya_ongkir'])->distinct()->first();
        $cart = keranjang::where('id_pembeli',$id)->where('status_order','keranjang')->get();
        $hitung = keranjang::where('id_pembeli',$id)->where('status_order','keranjang')->count();
        return view('pelanggan.cart')->with([
            'cart' => $cart,
            'ongkir' => $ongkir,
            'ekspedisi' => $ekspedisi,
            'hitung' => $hitung
        ]);
    }

    public function delete($id){
        $cart = keranjang::where('id_keranjang',$id)->first();

        $produk = produk::where('id',$cart->id_produk)->first();
        $produk->jumlah_terjual = $produk->jumlah_terual - $cart->jumlah_produk;
        $produk->save();
        
        $keranjang = keranjang::where('id_keranjang',$id)->delete();

        return redirect::back();
    }

    public function checkout(Request $request){
        $cek = User::where('id',Auth::user()->id)->first();
        if($cek->alamat!=NULL){
            $data = $request->input('data');
            foreach($data as $data){
                $cart = keranjang::where('id',$data['id'])->update([
                    'status_order' => 'order'
                ]);
            }

            $produk = $request->input('produk');
            foreach($produk as $produk){
                $hitung = produk::where('id',$produk['id_produk'])->first();
                $total = $hitung->Quantity - $produk['jumlah_produk'];
                $data = produk::where('id',$produk['id_produk'])->update([
                    'Quantity' => $total
                ]);
            }

            return redirect::route('dasboard')->with('status', 'Order Sudah Di Kirim!');
        }elseif($cek->alamat==NULL){
            return redirect::route('ProfileUser',Auth::user()->id);
        }
    }

    public function ekspedisi(Request $request,$id){
        $keranjang = keranjang::where('id_pembeli',Auth::user()->id)->where('status_order','keranjang')->update([
            'id_ekspedisi' => $request->ekspedisi
        ]);

        return redirect::back();
    }
}
