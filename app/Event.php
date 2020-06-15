<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable=['name', 'description','lenguages','profile_id',];
    public function profiles(){
        return $this->belongsToMany('App\Profile'); 
    }
}
