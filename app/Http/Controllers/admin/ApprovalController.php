<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\User;
use App\pinjam;
use App\users\Departement;
use App\ruang;
use App\pesan;
use App\laporan;
use App\peminjaman;
use App\inventaris\jenis;
use App\inventaris\inventaris;
use Redirect;
use Auth;
use Yajra\Datatables\Datatables;

class ApprovalController extends Controller
{
    
    public function __construct(){

        $this->middleware('auth');
        $this->middleware('rule:admin');
    }

    public function ruangan(){
        $kode = ruang::all()->count();
        return view('admin.tambahruang')->with([
            'kode' => $kode
        ]);
    }

    public function addruang(Request $request){
        $ruang=new ruang;
        $ruang->nama_ruang=$request->ruang;
        $ruang->kode_ruang= $request->kode;
        $ruang->keterangan=$request->keterangan;
        $ruang->save();

        return Redirect::back()->with('status', ''.$ruang->nama_ruang.' Berhasil Di Ditambahkan!');
    }

    public function index()
    {
        
        $users = new User;
        $pesan = pesan::all();
        $inven = inventaris::all()->count();
        $users = User::all()->count();
        $peminjaman = DB::table('peminjaman')
        ->join('petugas','petugas.id','=','peminjaman.id_peminjam')
        ->get();
        $list = peminjaman::where('persetujuan','kirim');
        //dd($list);
        $pinjam = inventaris::all()->sum('pinjam');
        $masuk = inventaris::all()->sum('jumlah');
        $invent = DB::table('inventaris')
        ->join('jenis','jenis.id_jenis','=','inventaris.id_jenis')
        ->join('ruang','ruang.id_ruang','=','inventaris.id_ruang')
        ->get();
        return view('admin.dasboard')->with([
            'users' => $users,
            'pesan' => $pesan,
            'list' => $list,
            'peminjaman' => $peminjaman,
            'pinjam' => $pinjam,
            'invent' => $invent,
            'masuk' => $masuk,
            'inven' =>$inven
            ]);
    }

    public function approve(Request $request,$id_peminjaman){
        $list = peminjaman::find($id_peminjaman);
        $list->persetujuan=$request->setuju;
        $list->pesan='permintaan peminjaman anda, kami terima';
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

    public function prin(){
        $depts = Departement::all();
        $invent = DB::table('inventaris')
        ->join('jenis','jenis.id_jenis','=','inventaris.id_jenis')
        ->join('ruang','ruang.id_ruang','=','inventaris.id_ruang')
        ->get();
        //dd($invent);
        $users = User::where([
            ['status','active']
        ])->get();
        return view('admin.printhasil')->with([
            'depts' => $depts,
            'inven' => $invent,
            'users' => $users]);
    }

    public function tolak(Request $request,$id_peminjaman){
        $list = peminjaman::find($id_peminjaman);
        $list->persetujuan=$request->tolak;
        $list->pesan='maaf permintaan anda kami tolak, karna alasan tertentu. untuk info lebih lanjut bisa langsung hubungi kami';
        $list->save();

        return Redirect::back()->with('status', ' Permintaan Ditolak !');
    }

    public function list(){
        $inven= DB::select('inventaris');
        $pinjam = DB::table('peminjaman')
        ->join('petugas','petugas.id','=','peminjaman.id_peminjam')
        ->join('inventaris','inventaris.id_inven','=','peminjaman.id_inventaris')
        ->get();
        //dd($pinjam);
        return view('admin.approve')->with([
            'pinjam' => $pinjam,
            'inven' => $inven
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
        ->get()->sortByDesc('created_at');
        $invent = DB::table('inventaris')
        ->join('jenis','jenis.id_jenis','=','inventaris.id_jenis')
        ->join('ruang','ruang.id_ruang','=','inventaris.id_ruang')
        ->get();
        return view('admin.laporan')->with([
            'users' => $users,
            'pinjam' => $pinjam,
            'jumlah' => $jumlah,
            'invent' => $invent,
            'masuk' => $masuk,
            'inven' =>$inven,
            'pinjaman' => $pinjaman
            ]);

    }

    public function update($id)

    {

        $affectedRows = User::where('id', '=', $id)->update(['status' => 'active']);
        return redirect()->to('userapproval');

    }

    public function destroy($id)

    {

        $affectedRows = User::where('id', '=', $id)->delete();
        return redirect()->to('userapproval');

    }

    public function laporan(){

    }

    public function pinjamadmin(){
        
        $jenis = jenis::all();
        $invent = DB::table('inventaris')
        ->join('jenis','jenis.id_jenis','=','inventaris.id_jenis')
        ->join('ruang','ruang.id_ruang','=','inventaris.id_ruang')
        ->get();
        $inven = inventaris::all()->count();
        $users = User::all()->count();
        $user = user::all();
        $pinjam = pinjam::all()->count();
        return view('admin.pinjam')->with([
            'users' => $users,
            'jenis' => $jenis,
            'pinjam' => $pinjam,
            'invent' => $invent,
            'inven' =>$inven,
            'user' => $user
            ]);
    }

    public function deleteruang(Request $request, $id_ruang){
        $ruangan = ruang::where('id_ruang',$id_ruang)->first();
        $ruangan->delete();

        return Redirect::back()->with('status', ''.$ruangan->nama_ruang.' Berhasil Di Hapus!');
    }

    public function editruang($id_ruang, Request $request){

        $ruang = ruang::find($id_ruang);
        $ruang->nama_ruang = $request->ruang;
        $ruang->keterangan = $request->keterangan;
        $ruang->save();
        
        return Redirect::back()->with('status','Data Ruang Telah Dirubah !');
    }

    public function editbarang($id_inven, Request $request){

        $barangg = inventaris::find($id_inven);
        $barangg->nama = $request->barang;
        $barangg->kondisi = $request->kondisi;
        $barangg->jumlah = $request->jumlah;
        $barangg->save();

        //dd($barangg);
        
        return Redirect::back()->with('status','Data Barang Telah Dirubah !');
    }

    public function deletebarang(Request $request, $id_inven){
        $barangnya = inventaris::where('id_inven',$id_inven)->first();
        $barangnya->delete();

        return Redirect::back()->with('status', ''.$barangnya->nama.' Berhasil Di Hapus!');
    }

    public function pinjamya(Request $request, $id_inventaris){
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

    public function ruang(){
        $ruang = ruang::all();
        $kode = ruang::all()->count();
        return view('admin.ruang')->with([
            'ruang' => $ruang,
            'kode' => $kode
        ]);
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
        return view('admin.kembali')->with([
            'pinjam' => $pinjam
        ]);
    }
}