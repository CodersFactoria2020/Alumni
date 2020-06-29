<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $fillable = ['name'];

    public function jobOffer(){

        return $this->belongsToMany(JobOffer::class, 'job_offer_language');
    }

    public function project(){

        return $this->belongsToMany(Project::class, 'project_language');
    }

    public function thread(){

        return $this->belongsToMany(Thread::class, 'thread_language', 'thread_id');
    }
}
