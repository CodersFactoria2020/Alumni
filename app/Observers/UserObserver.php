<?php

namespace App\Observers;

use App\Role;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Roles;

class UserObserver
{

    public function created(User $user){
            DB::table('profiles')->insert(
                [
                    'nickname' => $user->name,
                    'aboutme' => 'Soy nuevo en Alumni',
                    'web'=>'tuweb.com',
                    'social'=>'Redes sociales (instagram, linkedin ...)',
                    'user_id'=>$user->id
                ]
            );


            DB::table('role_user')->insert(
                [
                    'role_id' => Role::$default,
                    'user_id' => $user->id
                ]
            );
    }

    public function updated(User $user)
    {
        //
    }

    public function deleted(User $user)
    {
        //
    }

    public function restored(User $user)
    {
        //
    }

    public function forceDeleted(User $user)
    {
        //
    }
}
