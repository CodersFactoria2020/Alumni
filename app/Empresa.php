<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

use Illuminate\Http\Request;

class Empresa extends Model
{
    protected $fillable = ['name', 'description'];

    public function Prueba()
    {
        return $this->hasMany(Prueba::class);
    }

}
