<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Permission\Models\Role; 
use App\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class PermissionInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Truncate Table Pibot and Models 
        DB::statement("SET foreign_key_checks=0"); //asi los desabilitamos a foreingkey
  	        DB::table('role_user')->truncate();
  	        DB::table('permission_role')->truncate();
  	        Permission::truncate();
  	        Role::truncate();
        DB::statement("SET foreign_key_checks=1");

        //User Admin 
        $useradmin = User::where('email','admin@admin.com')->first();
        if ($useradmin){
            $useradmin->delete();
        }

        $useradmin = User::create([
            'name'     => 'admin',
            'email'    => 'admin@admin.com',
            'password' => Hash::make('admin')
        ]);

        //Role Admin
        $roladmin = Role::create([
            'name' => 'Admin',
            'slug' => 'admin',
            'description' => 'Admin',
            'full-access' => 'yes',
        ]);
        
        //Relation Role and User
        $useradmin->roles()->sync([$roladmin->id]);

        //Permission
        $permission_all = [];

        
        //Permission Role
        $permission = Permission::create([
            'name' => 'List role',
            'slug' => 'role.index',
            'description' => 'A user can list role',
        ]);

        $permission_all[] = $permission->id;
                
        $permission = Permission::create([
            'name' => 'Show role',
            'slug' => 'role.show',
            'description' => 'A user can see role',
        ]);

        $permission_all[] = $permission->id;
                
        $permission = Permission::create([
            'name' => 'Create role',
            'slug' => 'role.create',
            'description' => 'A user can create role',
        ]);

        $permission_all[] = $permission->id;
                
        $permission = Permission::create([
            'name' => 'Edit role',
            'slug' => 'role.edit',
            'description' => 'A user can edit role',
        ]);

        $permission_all[] = $permission->id;
                
        $permission = Permission::create([
            'name' => 'Destroy role',
            'slug' => 'role.destroy',
            'description' => 'A user can destroy role',
        ]);

        $permission_all[] = $permission->id;

        //Permission User
        $permission = Permission::create([
            'name' => 'List user',
            'slug' => 'user.index',
            'description' => 'A user can list user',
        ]);
        
        $permission_all[] = $permission->id;
        
        $permission = Permission::create([
            'name' => 'Show user',
            'slug' => 'user.show',
            'description' => 'A user can see user',
        ]);        
        
        $permission_all[] = $permission->id;
        
        $permission = Permission::create([
            'name' => 'Edit user',
            'slug' => 'user.edit',
            'description' => 'A user can edit user',
        ]);
        
        $permission_all[] = $permission->id;
        
        $permission = Permission::create([
            'name' => 'Destroy user',
            'slug' => 'user.destroy',
            'description' => 'A user can destroy user',
        ]);


        //new


        $permission_all[] = $permission->id;
        
        $permission = Permission::create([
            'name' => 'Show own user',
            'slug' => 'userown.show',
            'description' => 'A user can see own user',
        ]);        
        
        $permission_all[] = $permission->id;
        
        $permission = Permission::create([
            'name' => 'Edit own user',
            'slug' => 'userown.edit',
            'description' => 'A user can edit own user',
        ]);
        
        



        /*$permission_all[] = $permission->id;

        $permission = Permission::create([
            'name' => 'Create user',
            'slug' => 'user.create',
            'description' => 'A user can create user',
        ]);
        
        $permission_all[] = $permission->id;
        */
        //End Permission User

        //table permission_role
        //$roladmin->permissions()->sync( $permission_all);
         
    }
}
