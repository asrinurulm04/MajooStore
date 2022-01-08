<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Redirect;
use App\model\users\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function home()
    {
        // jika admin
        // user() : model user
        // ->role : relasi dgn tabel role
        // ->namaRule : kolom 'role' pada table 'role'
 
        if (auth()->check() && Auth::user()->role->namaRule == 'admin'){
            return Redirect::route('dasboard');
        // jika non admin
        }elseif (auth()->check() && Auth::user()->role->namaRule == 'suplier'){
            return Redirect::route('dasboard');
        }elseif (auth()->check() && Auth::user()->role->namaRule == 'pelanggan'){
            return Redirect::route('dasboard');
        }else{
            return view ('auth.login');
        }
    }
}
