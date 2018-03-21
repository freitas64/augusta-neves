<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manuais extends Model
{
    //
    //
    public function ensino(){
        return $this->belongsTo('App\Ensinos');
    }
}
