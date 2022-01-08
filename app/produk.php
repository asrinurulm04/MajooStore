<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class produk extends Model
{
    protected $table ='produk';
    protected $primaryKey='id';
    
    public function type()
    {
        return $this->hasOne('App\type','id','id_kategori');
    }
}
