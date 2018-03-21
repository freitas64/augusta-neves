<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmailNewsletter extends Model
{
    public function contactsNewsletter(){
        return $this->belongsToMany('App\ContactsNewsletter')->withPivot('id');;
    }
}
