<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\produk;
use Redirect;

class ProdukController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function listProduk(){
        return view('admin.listproduk');
    }

    public function editproduk(){
        return view('admin.editproduk');
    }

    public function showproduk(){
        return view('admin.showproduk');
    }
    
    public function addproduk(){
        return view('admin.addproduk');
    }

    public function newProduk(Request $request){
        $add = new produk;
        $add->nama_produk=$request->nama;
        $add->desc=$request->desc;
        $add->Quantity=$request->jumlah;
        $add->status=$request->status;
        $add->image=$request->image;
        $add->save();

        return redirect::route('dasboard');
    }
}
