<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{

    protected $fillable = ['id', 'title', 'description', 'repository', 'status', 'username', 'email'];

    public function tags(){

        return $this->belongsToMany(Tag::class, 'project_tag');
    }

}
