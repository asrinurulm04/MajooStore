<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class keranjang extends Model
{
    protected $table = 'keranjang';
    protected $primaryKey ='id';

    public function produk(){
        return $this->hasOne('App\produk','id','id_produk');
    }
}
