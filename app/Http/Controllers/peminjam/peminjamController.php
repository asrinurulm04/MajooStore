<?php

namespace App\Http\Controllers\peminjam;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\User;
use App\users\Departement;
use App\inventaris\inventaris;
use App\inventaris\jenis;
use App\Role;
use App\ruang;
use App\pinjam;
use App\Peminjaman;
use Redirect;
use Auth;

class peminjamController extends Controller
{
    public function __construct(){

        $this->middleware('auth');
        $this->middleware('rule:peminjam');
    }

    public function peminjam(){

        $users = new User;
        $inven = inventaris::all()->count();
        $users = User::all()->count();
        $pinjam = pinjam::all()->count();
        $invent = DB::table('inventaris')
        ->join('jenis','jenis.id_jenis','=','inventaris.id_jenis')
        ->join('ruang','ruang.id_ruang','=','inventaris.id_ruang')
        ->get();
        return view('peminjam.peminjam')->with([
            'users' => $users,
            'pinjam' => $pinjam,
            'invent' => $invent,
            'inven' =>$inven
            ]);
    }

    public function pinjam(){

        $jenis = jenis::all();
        $invent = DB::table('inventaris')
        ->join('jenis','jenis.id_jenis','=','inventaris.id_jenis')
        ->join('ruang','ruang.id_ruang','=','inventaris.id_ruang')
        ->get();
        $inven = inventaris::all()->count();
        $users = User::all()->count();
        $user = user::all();
        $pinjam = pinjam::all()->count();
        return view('peminjam.pinjam')->with([
            'users' => $users,
            'jenis' => $jenis,
            'pinjam' => $pinjam,
            'invent' => $invent,
            'inven' =>$inven,
            'user' => $user
            ]);
    }

    public function pinjamya(Request $request, $id_inventaris){
        $list= inventaris::where('id_inven',$id_inventaris)->first();
        $stokk = $list->jumlah;

        if($request->stokk > $stokk){
             return redirect()->back()->with('status', ' Data Yang Anda Masukan Melebihi Stok !');
            //return abort(404);
        }
        
        $pinjamya = new peminjaman;
        $pinjamya->id_peminjam=Auth::user()->id;
        $pinjamya->tanggal_pinjam=$request->date;
        $pinjamya->id_pegawai=$request->pegawai;
        $pinjamya->id_inventaris=$request->inven;
        $pinjamya->jumlahpinjam=$request->stokk;
        $pinjamya->keterangan=$request->keterangan;
        $pinjamya->save();

        return redirect()->back();

    }

    public function lapor()
    {  
        $users = new User;
        $inven = inventaris::all()->count();
        $users = User::all()->count();
        $jumlah = peminjaman::where('persetujuan','kirim')->count();
        $pinjam = inventaris::all()->sum('pinjam');
        $masuk = inventaris::all()->sum('jumlah');
        $pinjaman = DB::table('peminjaman')
        ->join('petugas','petugas.id','=','peminjaman.id_peminjam')
        ->join('inventaris','inventaris.id_inven','=','peminjaman.id_inventaris')
        ->join('ruang','ruang.id_ruang','=','inventaris.id_ruang')
        ->get();
        $invent = DB::table('inventaris')
        ->join('jenis','jenis.id_jenis','=','inventaris.id_jenis')
        ->join('ruang','ruang.id_ruang','=','inventaris.id_ruang')
        ->get();
        return view('peminjam.pdf')->with([
            'users' => $users,
            'pinjam' => $pinjam,
            'jumlah' => $jumlah,
            'invent' => $invent,
            'masuk' => $masuk,
            'inven' =>$inven,
            'pinjaman' => $pinjaman
            ]);

    }

    public function pdf()
    {  
        $pinjaman = DB::table('peminjaman')
        ->join('petugas','petugas.id','=','peminjaman.id_peminjam')
        ->join('inventaris','inventaris.id_inven','=','peminjaman.id_inventaris')
        ->join('ruang','ruang.id_ruang','=','inventaris.id_ruang')
        ->get();
        $invent = DB::table('inventaris')
        ->join('jenis','jenis.id_jenis','=','inventaris.id_jenis')
        ->join('ruang','ruang.id_ruang','=','inventaris.id_ruang')
        ->get();
        return view('operator.download')->with([
            'invent' =>$invent,
            'pinjaman' => $pinjaman
            ]);

    }

}
