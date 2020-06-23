<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobOffer extends Model
{
    protected $fillable = ['position', 'empresa_id', 'location', 'description'];

    public function empresa(){

        return $this->belongsTo(Empresa::class);
    }
    public function languages(){

        return $this->belongsToMany(Language::class, 'job_offer_language');
    }
}

