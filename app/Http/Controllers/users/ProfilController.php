<?php

namespace App\Http\Controllers\users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\users\departement;
use App\User;
use Auth;
use Redirect;

class ProfilController extends Controller
{
    public function __construct(){

        $this->middleware('auth');
    }

    public function show(){
        
        
        $id = Auth::id();
        $users = User::find($id);
        return view('myprofile')->with([
            'users' => $users]);

    }

    public function update(Request $request){

        $id = Auth::id();
        $user = User::find($id);
        
        $this->validate(request(), [
            'username' => 'unique:users,username,'.$user->id,
            'email' => 'unique:users,email,'.$user->id,
            'password' => 'confirmed'
        ]);
        
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();
        
        return Redirect::route('dasboard')->with('status','Profil Anda Telah Dirubah !');

    }

}
