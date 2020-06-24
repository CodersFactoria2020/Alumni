<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Traits\UserTrait;
use App\Role;

class User extends Authenticatable
{
    use Notifiable, UserTrait;

    protected $fillable = [
        'name', 'email', 'password','acces',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function currentRole ()
    {
        return $this->roles->last();
        //return $this->users->latest()->take(2);
    }
}
