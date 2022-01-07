<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class peminjaman extends Model
{
    protected $table = 'peminjaman';
    protected $primaryKey ='id_peminjaman';

    public function petugas()
    {
        return $this->hasMany('App\petugas','id_petugas','id_petugas');
    }

    public function inven()
    {
        return $this->hasOne('App\inventaris\inventaris','id_inventaris','id_inven');
    }

    public function ruang()
    {
        return $this->hasOne('App\ruang','id_ruang','id_ruang');
    }

    public function jenis()
    {
        return $this->hasMany('App\jenis','id_jenis','id_jenis');
    }
}
