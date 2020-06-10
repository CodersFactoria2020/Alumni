<?php

namespace App;

use Illuminate\Database\Eloquent\Model;use Illuminate\Support\Facades\App;

class Empresa extends Model
{
    protected $fillable = ['name', 'description', 'logo'];

}
