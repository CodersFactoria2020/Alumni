<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Prueba extends Model
{
    protected $fillable = ['title', 'description', 'document', 'empresa_id'];

    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }
    
}
