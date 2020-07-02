<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{

    protected $fillable = ['id', 'title', 'description', 'repository', 'status', 'username', 'email'];

    public function languages(){

        return $this->belongsToMany(Language::class, 'project_language');
    }
}
