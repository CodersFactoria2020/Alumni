<?php

namespace App\Permission\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

    protected $fillable = [
        'name', 'slug', 'description', 'full-access',
    ];

    public function users()
    {
        //Relacion N a N User y Roles
        return $this->belongsToMany('App\User')->withTimesTamps(); 
    }

    public function permissions()
    {
        //Relacion N a N Roles y Permission
        return $this->belongsToMany('App\Permission\Models\Permission')->withTimesTamps();
    }

}
