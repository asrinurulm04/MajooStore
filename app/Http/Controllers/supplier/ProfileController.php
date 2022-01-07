<?php

namespace App\Http\Controllers\supplier;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Toko;
use App\type;
use Auth;
use Redirect;

class ProfileController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function profile(){
        $type = type::all();
        return view('supplier.profile')->with([
            'type'  => $type
        ]);
    }

    public function addToko(Request $request){
        $toko = new Toko;
        $toko->nama_toko= $request->nama_toko;
        $toko->pemilik= Auth::user()->id;
        $toko->alamat_toko = $request->alamat;
        $toko->email = $request->email;
        $toko->no_telp = $request->no;
        $toko->type = $request->type;
        $toko->save();

        return redirect::route('addproduk')->with('status', 'Data berhasil Ditambahkan');
    }
}
