<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable=['name', 'slug', 'description','full-access',];

    static int $default=3;

    public function users(){
        return $this->belongsToMany('App\User','role_user'); 
    }
    public function permissions(){
        return $this->belongsToMany('App\Permission','permission_role');    
     }
}
