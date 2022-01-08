<?php

namespace App\Http\Controllers\users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

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
}
