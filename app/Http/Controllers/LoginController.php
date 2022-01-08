<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User;

class LoginController extends Controller
{
    public function __construct(){
        $this->middleware('guest');
    }
    
    public function getLogin(){
        
    return view('auth.login');
    }

    public function postLogin(Request $request){
        //ADMIN==========================================================================================
        if(Auth::attempt([
            'username' =>$request->inputEmailUser,
            'password' => $request->password,
            'status' => 'active',
            'role_id' => 1
        ])){
            return redirect('/dasboard');
        }

        //SUPPLIER============================================================================================
        if(Auth::attempt([
            'username' =>$request->inputEmailUser,
            'password' => $request->password,
            'status' => 'active',
            'role_id' => 2
        ])){
            return redirect()->route('dasboard');
        }

        //PELANGGAN============================================================================================
        if(Auth::attempt([
            'username' =>$request->inputEmailUser,
            'password' => $request->password,
            'status' => 'active',
            'role_id' => 3
        ])){
            return redirect()->route('dasboard');
        }
        

        //Gagal==========================================================================================
        else{
            return back()->withErrors([
                'message' => 'The email Username or password is incorrect, or maybe your Account have not approve'
            ]);
        }
    }
}
