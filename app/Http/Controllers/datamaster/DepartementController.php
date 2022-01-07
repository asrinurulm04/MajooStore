<?php

namespace App\Http\Controllers\datamaster;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\users\Departement;
use App\inventaris\inventaris;
use App\peminjaman;
use App\User;
use Redirect;

class DepartementController extends Controller
{
    public function __construct(){

        $this->middleware('auth');
    }

    public function dept(){
        $depts = Departement::all();
        $invent = DB::table('inventaris')
        ->join('jenis','jenis.id_jenis','=','inventaris.id_jenis')
        ->join('ruang','ruang.id_ruang','=','inventaris.id_ruang')
        ->get();
        //dd($invent);
        $users = User::where([
            ['status','active']
        ])->get();
        return view('admin.depts')->with([
            'depts' => $depts,
            'inven' => $invent,
            'users' => $users]);

    }

    public function seluruh(){
        $depts = Departement::all();
        $invent = DB::table('inventaris')
        ->join('jenis','jenis.id_jenis','=','inventaris.id_jenis')
        ->join('ruang','ruang.id_ruang','=','inventaris.id_ruang')
        ->get();
        //dd($invent);
        $users = User::where([
            ['status','active']
        ])->get();
        return view('admin.laporanseluruh')->with([
            'depts' => $depts,
            'inven' => $invent,
            'users' => $users]);

    }

    public function delinven($id_inventaris){
        $inven = Inventaris::where('id_inven',$id_inventaris)->first();
        $n = $inven->nama;
        $inven->delete();

        return Redirect::back()->with('error', 'Departement '.$n.' Telah Dihapus!');
    }

    public function adddept(Request $request){
        $dept = new Departement;
        $dept->dept = $request->dept;
        $dept->nama_dept = $request->nama_dept;
        $dept->manager_id = $request->manager;
        $dept->save();

        return Redirect::back()->with('status', 'Departement '.$dept->dept.' Telah Ditambahkan!');
    }

    public function formupdatedept($id){
        $dept = Departement::where([
            ['id',$id]
            ])->first();
        $users = User::where([
            ['status','active']
        ])->get();


        return view('admin.editdept')->with([
            'dept' => $dept,
            'users' => $users
        ]);
    }

    public function saveupdateDept($id,Request $request){
        $dept = Departement::find($id)->first();
        $dept->dept = $request->dept;
        $dept->nama_dept = $request->nama_dept;
        $dept->manager_id = $request->manager;
        $dept->save();

        return Redirect()->route('dept')->with('status', 'Departement '.$dept->dept.' Telah DiUpdate!');
        
    }
}
