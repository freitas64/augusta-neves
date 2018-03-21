<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    // Relação de muitos para muitos com a tabela dos Post
    public function posts(){
        return $this->belongsToMany('App\Post');
    }
}
