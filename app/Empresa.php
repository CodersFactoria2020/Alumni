<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $fillable = ['name', 'empresa_id'];

    public function joboffers(){

        return $this->hasMany(JobOffer::class);
    }
}
