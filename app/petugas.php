<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class petugas extends Model
{
    protected $table = 'petugas';

    public function petugas()
    {
        return $this->hasMany('App\inventaris\inventaris','id_petugas','id_petugas');
    }
}
