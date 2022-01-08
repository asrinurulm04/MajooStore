<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Toko;
use App\produk;
use Auth;

class DasboardController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(){
        $produk = produk::where('Quantity','!=','0')->get();
        $toko = Toko::where('pemilik',Auth::user()->id)->count();
        return view('dasboard')->with([
            'toko' => $toko,
            'produk' => $produk
        ]);
    }
}
