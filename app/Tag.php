<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model

{
    protected $fillable = ['name'];

    public function jobOffer(){

        return $this->belongsToMany(JobOffer::class, 'job_offer_tag');
    }

    public function project(){

        return $this->belongsToMany(Project::class, 'project_tag');
    }
}


