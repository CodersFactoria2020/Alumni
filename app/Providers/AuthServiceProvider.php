<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\User;
use App\Policies\UserPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        //'App\Model' => 'App\Policies\ModelPolicy',
        User::class => UserPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //por lo que entiendo Gate similar a las rutas de get

        Gate::define('haveaccess', function (User $user, $perm){
            //dd($user);
            //dd($user->id); //muestra el id de user logeado
            //dd($perm);
            //return true; 
            //return $perm;
            return $user->havePermission($perm); //havePermission es una funcion de trait return true o false
        });
        //
    }
}
