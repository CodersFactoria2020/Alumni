<?php

use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{

    public function run()
    {
        factory(\App\Permission::class)->create(['name'=>'List users', 'slug'=>'user.index', 'description'=>'Can list users.']);
        factory(\App\Permission::class)->create(['name'=>'Create user', 'slug'=>'user.create', 'description'=>'Can create an user.']);
        factory(\App\Permission::class)->create(['name'=>'Edit user', 'slug'=>'user.edit', 'description'=>'Can edit users.']);
        factory(\App\Permission::class)->create(['name'=>'View user', 'slug'=>'user.show', 'description'=>'Can view users.']);
        factory(\App\Permission::class)->create(['name'=>'Destroy user', 'slug'=>'user.destroy', 'description'=>'Can delete users.']);
        
        factory(\App\Permission::class)->create(['name'=>'List roles', 'slug'=>'role.index', 'description'=>'Can list roles.']);
        factory(\App\Permission::class)->create(['name'=>'Create role', 'slug'=>'role.create', 'description'=>'Can create a role.']);
        factory(\App\Permission::class)->create(['name'=>'Edit role', 'slug'=>'role.edit', 'description'=>'Can edit roles.']);
        factory(\App\Permission::class)->create(['name'=>'View role', 'slug'=>'role.show', 'description'=>'Can view roles.']);
        factory(\App\Permission::class)->create(['name'=>'Destroy role', 'slug'=>'role.destroy', 'description'=>'Can delete roles.']);

        factory(\App\Permission::class)->create(['name'=>'List profiles', 'slug'=>'profile.index', 'description'=>'Can list profiles.']);
        factory(\App\Permission::class)->create(['name'=>'Create profile', 'slug'=>'profile.create', 'description'=>'Can create a profile.']);
        factory(\App\Permission::class)->create(['name'=>'Edit profile', 'slug'=>'ownprofile.edit', 'description'=>'Can edit own profile.']);      
        factory(\App\Permission::class)->create(['name'=>'View profile', 'slug'=>'profile.show', 'description'=>'Can view events.']);
        factory(\App\Permission::class)->create(['name'=>'Destroy profile', 'slug'=>'ownprofile.destroy', 'description'=>'Can delete own profile.']);

        factory(\App\Permission::class)->create(['name'=>'List events', 'slug'=>'event.index', 'description'=>'Can list event.']);
        factory(\App\Permission::class)->create(['name'=>'Create event', 'slug'=>'event.create', 'description'=>'Can create an event.']);
        factory(\App\Permission::class)->create(['name'=>'Edit event', 'slug'=>'event.edit', 'description'=>'Can edit events.']);      
        factory(\App\Permission::class)->create(['name'=>'View event', 'slug'=>'event.show', 'description'=>'Can view events.']);
        factory(\App\Permission::class)->create(['name'=>'Destroy event', 'slug'=>'event.destroy', 'description'=>'Can delete events.']);

        factory(\App\Permission::class)->create(['name'=>'Asist event', 'slug'=>'event.asist', 'description'=>'Can asist to events.']);

        factory(\App\Permission::class)->create(['name'=>'Edit own user', 'slug'=>'ownuser.edit', 'description'=>'Can edit own user.']);
        factory(\App\Permission::class)->create(['name'=>'View own user', 'slug'=>'ownuser.show', 'description'=>'Can view own user.']);
        factory(\App\Permission::class)->create(['name'=>'Destroy own user', 'slug'=>'ownuser.destroy', 'description'=>'Can delete own user.']);

    }
}
