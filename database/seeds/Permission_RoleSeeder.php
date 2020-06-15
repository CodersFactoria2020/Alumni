<?php
use App\Role;
use App\Permission;
use Illuminate\Database\Seeder;

class Permission_RoleSeeder extends Seeder
{
    public function run()
    {
        for ($i=2; $i<=30; $i++){
            if (Role::find($i)){
                $role= Role::find($i);
                if($role->name=='Manager'){
                    $role->permissions()->sync([1,4,6,9,11,12,14,16,17,18,19,20,21,22,23,24]);
                }
                if($role->name=='Student'){
                    $role->permissions()->sync([11,12,14,16,17,18,19,20,21,22,23,24]);
                }
            }            
        }
        if (Role::find(1)){
            $role= Role::find(1);
            if ($role->name == 'Admin'){
                $permissions=[];
                for ($x=1; $x<=20; $x++){                
                    if(Permission::find($x)){
                        array_push($permissions, $x);
                    }
                }  
                $role->permissions()->sync($permissions);
            }
        }

    }
}
