<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobOffer extends Model
{
    protected $fillable = ['position', 'empresa_id', 'location', 'description'];

    public function empresa(){

        return $this->belongsTo(Empresa::class);
    }
    public function tags(){

        return $this->belongsToMany(Tag::class, 'job_offer_tag');
    }
}

