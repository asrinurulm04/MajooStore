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

    public function profile($id){
        $type = type::all();
        $hitung = Toko::where('pemilik',$id)->count();
        $toko = Toko::where('pemilik',$id)->first();
        return view('supplier.profile')->with([
            'type'  => $type,
            'hitung' => $hitung,
            'toko' => $toko
        ]);
    }

    public function addToko(Request $request,$id){
        $cek = Toko::where('pemilik',$id)->count();
        if($cek=='0'){ // jika belum ada toko dengan id pemilik seperti $id maka akan membuat toko baru
            $toko = new Toko;
        }elseif($cek!='0'){ // jika data sudah ada maka data sebelumnya akan di update
            $toko = Toko::where('pemilik',$id)->first();
        }
        $toko->nama_toko= $request->nama_toko;
        $toko->pemilik= Auth::user()->id;
        $toko->alamat_toko = $request->alamat;
        $toko->email = $request->email;
        $toko->no_telp = $request->no;
        $toko->info = $request->info;
        $toko->save();

        return redirect::route('dasboard')->with('status', 'Data berhasil Ditambahkan');
    }
}
