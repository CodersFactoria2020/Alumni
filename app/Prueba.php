<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prueba extends Model
{
    protected $fillable = ['title', 'description', 'document', 'empresa_id'];

    public function Empresa()
    {
        return $this->belongsTo(Empresa::class);
    }

 
}
