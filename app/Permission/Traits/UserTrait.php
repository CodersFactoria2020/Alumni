<?php

namespace App\Permission\Traits;

trait UserTrait {

    //Relacion N a N User y Roles
    public function roles(){
        return $this->belongsToMany('App\Permission\Models\Role')->withTimesTamps();
    }

    //11junio

    public function havePermission($permission){
        //con esto un user puede tener varios roles o el rol 
        foreach ($this->roles as $role) {
            //recorremos todos los roles y lo iteramos con role
            //queremos comprobar que lo que tengamos en el campo fullacces
            // tenemo en la tabla migratio role el campo full acces
            if($role['full-access']== 'yes'){
                //return 'true full acces';
                return true;
            }

            foreach ($role->permissions as $perm){

                if($perm->slug == $permission ){
                    //return 'true for any permission';
                    return true;
                }

            }
        }
        //return 'false full acces';
        //return 'Prueba Test';
        return false;
    }
    //11junio

}