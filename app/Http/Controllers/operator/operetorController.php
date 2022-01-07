<?php

namespace App\Http\Controllers\operator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\User;
use App\users\Departement;
use App\Role;
use App\pinjam;
use App\laporan;
use App\ruang;
use App\peminjaman;
use App\inventaris\jenis;
use App\inventaris\inventaris;
use Redirect;
use Auth;
use PDF;

class operetorController extends Controller
{
    public function __construct(){

        $this->middleware('auth');
        $this->middleware('rule:operator');
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
        return view('operator.pinjam')->with([
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

    public function kembaliin(Request $request,$id_inventaris){
        $kembali = Inventaris::where('id_inven',$id_inventaris)->first();
        $jumlah=$kembali->jumlah;
        $pinjam=$kembali->pinjam;
        $data=$request->kembali;

        $hasilnya=($jumlah+$data);
        $kurang=($pinjam-$data);
        $kembali->jumlah=$hasilnya;
        $kembali->pinjam=$kurang;
        $kembali->save();

        $kembalii = peminjaman::where('id_inventaris',$id_inventaris)->first();
        //dd($kembalii);
        $kembalii->delete();

        return redirect()->back();
    }

    public function kembali(){
        $pinjam = DB::table('peminjaman')
        ->join('petugas','petugas.id','=','peminjaman.id_peminjam')
        ->join('inventaris','inventaris.id_inven','=','peminjaman.id_inventaris')
        ->get();
        //dd($pinjam);
        return view('operator.kembali')->with([
            'pinjam' => $pinjam
        ]);
    }

    public function operator(){

        $users = new User;
        $inven = inventaris::all()->count();
        $users = User::all()->count();
        $pinjam = pinjam::all()->count();
        $invent = DB::table('inventaris')
        ->join('jenis','jenis.id_jenis','=','inventaris.id_jenis')
        ->join('ruang','ruang.id_ruang','=','inventaris.id_ruang')
        ->get();
        return view('operator.operator')->with([
            'users' => $users,
            'pinjam' => $pinjam,
            'invent' => $invent,
            'inven' =>$inven
            ]);
    }

    public function approve(Request $request,$id_peminjaman,$id_inventaris){
        $list = peminjaman::find($id_peminjaman);
        $list->persetujuan=$request->setuju;
        $list->save();

        $peminjaman = new pinjam;
        $peminjaman->id_inventaris=$request->inven;
        $peminjaman->jumlah=$request->stokk;
        $peminjaman->save();

        $inven=inventaris::where('id_inven',$id_inventaris)->first();
        $stok=$inven->jumlah;
        $pinjam=$inven->pinjam;
        $baru=$request->stokk;

        $hasilpinjam=($pinjam+$baru);
        $hasilstok=($stok-$baru);
        $inven->jumlah=$hasilstok;
        $inven->pinjam=$hasilpinjam;
        $inven->save();

        return Redirect::back()->with('status', ' Permintaan Telah Disetujui !');
    }

    public function tolak(Request $request,$id_peminjaman){
        $list = peminjaman::find($id_peminjaman);
        $list->persetujuan=$request->tolak;
        $list->save();

        return Redirect::back()->with('status', ' Permintaan Ditolak !');
    }

    public function list(){
        $pinjam = DB::table('peminjaman')
        ->join('petugas','petugas.id','=','peminjaman.id_peminjam')
        ->join('inventaris','inventaris.id_inven','=','peminjaman.id_inventaris')
        ->join('ruang','ruang.id_ruang','=','inventaris.id_ruang')
        ->get();
        //dd($pinjam);
        return view('operator.approve')->with([
            'pinjam' => $pinjam
        ]);
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
        return view('operator.pdf')->with([
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

    public function download($id_inven){
        $pinjaman = DB::table('peminjaman')
        ->join('inventaris','inventaris.id_inven','=','peminjaman.id_inventaris')
        ->join('ruang','ruang.id_ruang','=','inventaris.id_ruang')
        ->get();
  
        $pdf = PDF::loadView('operator.pdf', compact('pinjaman'));
        return $pdf->download('invoice.pdf');
  
      }

      public function cetak(){
        $pinjaman = DB::table('peminjaman')
        ->join('petugas','petugas.id','=','peminjaman.id_peminjam')
        ->join('inventaris','inventaris.id_inven','=','peminjaman.id_inventaris')
        ->join('ruang','ruang.id_ruang','=','inventaris.id_ruang')
        ->get();
        $invent = DB::table('inventaris')
        ->join('jenis','jenis.id_jenis','=','inventaris.id_jenis')
        ->join('ruang','ruang.id_ruang','=','inventaris.id_ruang')
        ->get();
        return view('operator.cetak')->with([
            'invent' =>$invent,
            'pinjaman' => $pinjaman
            ]);
      }
}
