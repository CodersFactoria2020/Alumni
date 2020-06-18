<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = ['score', 'comment', 'empresa_id'];

    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }
}

