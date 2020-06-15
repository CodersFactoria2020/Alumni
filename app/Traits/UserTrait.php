<?php
namespace App\Traits;

trait UserTrait{

    public function roles(){
        return $this->belongsToMany('App\Role','role_user'); 
    }
    public function profile(){
        return $this->hasOne('App\Profile'); 
    }

    public function havePermission($permission_slug){
        foreach($this->roles as $role){
            if ($role['full-access']=='yes'){
                return true;
            }
            foreach ($role->permissions as $permission){
                if ($permission->slug == $permission_slug){
                    return true;
                }
            }           
        }
        return false;
    }
}