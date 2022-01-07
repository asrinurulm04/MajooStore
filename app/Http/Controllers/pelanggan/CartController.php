<?php

namespace App\Http\Controllers\pelanggan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function cart(){
        return view('pelanggan.cart');
    }
}
