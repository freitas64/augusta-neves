<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactsNewsletter extends Model
{
    protected $table = 'contactsNewsletter';

    protected $fillable = ['email', 'name'];

    public function email_newsletters(){
        return $this->belongsToMany('App\EmailNewsletter')->withPivot('id');;
    }
}
