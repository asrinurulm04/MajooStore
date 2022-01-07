<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\users\Departement;
use App\inventaris\inventaris;
use App\inventaris\jenis;
use App\Role;
use App\ruang;
use App\petugas;
use App\pinjam;
use Redirect;
use Auth;

class UserListController extends Controller
{
    public function __construct(){

        $this->middleware('auth');
        $this->middleware('rule:admin');
    }

    public function index()
    {
        $users = new User;
        $useroperator = user::where('role_id','2')->count();
        $useradmin = user::where('role_id','1')->count();
        $userpeminjam = user::where('role_id','3')->count();
        $users = User::all();
        return view('admin.listuser')->with([
            'users' => $users,
            'useroperator' => $useroperator,
            'useradmin' => $useradmin,
            'userpeminjam' => $userpeminjam
            ]);
    }

    public function blok($id){

        $user = User::find($id)->update(['status'=>'nonactive']);
        return Redirect::back();
        }

    public function open($id){

        $user = User::find($id)->update(['status'=>'active']);
        return Redirect::back();
    }
        
    public function show($id)
    {
        $users = User::find($id);
        $roles = Role::all();
        $depts = Departement::all();

        return view('admin.detail')->with([
            'users' => $users,
            'depts' =>$depts,
            'roles' =>$roles]);
    }

    public function insertdata(Request $request){

        $data = new inventaris;
        $data->nama=$request->nama;
        $data->kode_inventaris=$request->kode;
        $data->kondisi=$request->kondisi;
        $data->jumlah=$request->jumlah;
        $data->tanggal_register=$request->tgl;
        $data->id_ruang=$request->ruang;
        $data->id_jenis=$request->jenis;
        $data->id_petugas=Auth::user()->id;
        $data->save();

        return Redirect::back()->with('status', 'inventaris '.$data->nama.' Telah Ditambahkan!');
    }

    public function inventaris(){
        $jenis = jenis::all();
        $ruang = ruang::all();
        $hitung_inven_terakhir = inventaris::all()->count();
        return view('admin.inventaris')->with([
            'jenis' => $jenis,
            'ruang' => $ruang,
            'kode' => $hitung_inven_terakhir
        ]);
    }

    public function update($id,Request $request)
    {
        
        $user = petugas::find($id);
        
        $this->validate(request(), [
            'username' => 'unique:users,username,'.$user->id,
            'email' => 'unique:users,email,'.$user->id
        ]);
        
        
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->role_id = $request->role;
        $user->save();
        
        return Redirect::back()->with('status','Profil User Telah Dirubah !');
    }

}
