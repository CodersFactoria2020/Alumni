<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $authenticated_user)
    {
        //
    }

    public function view(User $authenticated_user, User $user, $permission=null)
    {
        if ($authenticated_user->havePermission($permission[0])){
            return true;
        }
        if ($authenticated_user->havePermission($permission[1])){
            if ($authenticated_user->id===$user->id){
                return true;
            }
        }
        return false;
    }

    public function create(User $authenticated_user)
    {
        //
    }

    public function update(User $authenticated_user, User $user, $permission=null)
    {
        if ($authenticated_user->havePermission($permission[0])){
            return true;
        }
        if ($authenticated_user->havePermission($permission[1])){
            if ($authenticated_user->id===$user->id){
                return true;
            }
        }
        return false;
    }

    public function delete(User $authenticated_user, User $user, $permission=null)
    {
        if ($authenticated_user->havePermission($permission[0])){
            return true;
        }
        if ($authenticated_user->havePermission($permission[1])){
            if ($authenticated_user->id===$user->id){
                return true;
            }
        }
        return false;
    }

    public function restore(User $authenticated_user, User $user)
    {
        //
    }

    public function forceDelete(User $authenticated_user, User $user)
    {
        //
    }
}
