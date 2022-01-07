<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ruang extends Model
{
    protected $table ='ruang';
    protected $primaryKey='id_ruang';

    public function petugas()
    {
        return $this->hasMany('App\petugas','id_petugas','id_petugas');
    }

    public function inven()
    {
        return $this->hasMany('App\inventaris\inventaris','id_inven','id_inven');
    }
}
