<?php

namespace App\users;

use Illuminate\Database\Eloquent\Model;

class Departement extends Model
{
    public function User(){
        return $this->hasOne('App\User');
    }
    protected $table = 'departements';
    protected $fillable = [
        'status'
    ];

}
