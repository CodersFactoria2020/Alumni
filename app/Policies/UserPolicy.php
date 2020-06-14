<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $usera
     * @return mixed
     */
    public function viewAny(User $usera)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $usera
     * @param  \App\User  $user
     * @return mixed
     */
    public function view(User $usera, User $user, $perm=null)
    {
        //usera = user autenticado
        //dd($usera->id);
        if($usera->havePermission($perm[0])){
            return true;
        }
        
        if($usera->havePermission($perm[1])){
            return $usera->id === $user->id;
        }
        return false;        
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $usera
     * @return mixed
     */
    public function create(User $usera)
    {
        //el user siempre es obligatorio 
        return $usera->id > 0;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $usera
     * @param  \App\User  $user
     * @return mixed
     */
    public function update(User $usera, User $user, $perm=null)
    {
        //
        if($usera->havePermission($perm[0])){
            return true;
        }

        if($usera->havePermission($perm[1])){
            return $usera->id === $user->id;
        }
        return false;
        
    }

    
}
