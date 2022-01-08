<?php

namespace App\Http\Controllers\users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Redirect;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function List(){
        $user = User::all();
        return view('admin.listuser')->with([
            'user' => $user
        ]);
    }

    public function ProfileUser($id){
        $user = User::where('id',$id)->first();
        return view('admin.profileUser')->with([
            'user' => $user
        ]);
    }

    public function update(Request $request, $id){
        $user = User::where('id',$id)->first();
        $this->validate(request(), [
            'password'  => 'confirmed'
        ]);
        
        $user->name     = $request->name;
        $user->username = $request->username;
        $user->alamat   = $request->alamat;
        $user->no_telp  = $request->no_telp;
        $user->password = $request->password;
        $user->save();
        
        return Redirect::route('dasboard')->with('status','Profil Anda Telah Dirubah !');
    }
}
