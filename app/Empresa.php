<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Empresa extends Model
{
    protected $fillable = ['name', 'description'];

    public function pruebas()
    {
        return $this->hasMany(Prueba::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

/*     public function average_score()
    {
            id bbss
        return $this->avg(‘score’)
    }
 */
}
