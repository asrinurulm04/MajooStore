<?php

namespace App\Http\Controllers\supplier;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function order(){
        return view('supplier.order');
    }
}
