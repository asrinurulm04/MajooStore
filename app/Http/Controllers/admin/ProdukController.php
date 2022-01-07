<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProdukController extends Controller
{
    public function __construct(){

        $this->middleware('auth');
    }

    public function listProduk(){
        return view('admin.listproduk');
    }
}
