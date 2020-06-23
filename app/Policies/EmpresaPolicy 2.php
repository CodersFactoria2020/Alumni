<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class EmpresaPolicy
{
    use HandlesAuthorization;


    public function __construct()
    {
        // 
    }

            // Aqui se ponen las consultas de qué puede o no el usuario

}
