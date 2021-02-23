<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'contacts';

    protected $fillable = ['firstname','lastname','email','message'];
    
    //  method definition  
    public function fullname() {
        return ucfirst($this->firstname) . ' ' . ucfirst($this->lastname);
    }

     // accessors
    public function getCreatedAtAttribute()
    {
        return  \Carbon\Carbon::parse($this->attributes['created_at'])->diffForHumans();
    }

    
}

/** 
 * 
 * 
laravel 
MVC   PHP framework
model    view       Controller
table    html       request/response view


*/