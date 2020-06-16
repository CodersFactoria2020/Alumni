<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;


class Profile extends Model
{
    protected $fillable=['nickname', 'aboutme','web','social','user_id'];
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function events(){
        return $this->hasMany('App\Event');
    }
}
