<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ensinos extends Model
{
    //
    protected $table = 'ensinos';

    public function manuais(){
        return $this->hasMany('App\Manuais');
    }
}
