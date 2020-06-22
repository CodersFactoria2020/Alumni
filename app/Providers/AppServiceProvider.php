<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Observers\UserObserver;
use App\User;

class AppServiceProvider extends ServiceProvider
{

    public function register()
    {
        //
    }

    public function boot()
    {
        User::observe(UserObserver::class);
        JsonResource::withoutWrapping();
    }
}