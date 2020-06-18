<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run()
    {
        factory(\App\Role::class)->create(['name'=>'Admin', 'slug'=>'admin', 'description'=>'Administrator of the site.', 'full-access'=>'yes']);
        factory(\App\Role::class)->create(['name'=>'Manager', 'slug'=>'manager', 'description'=>'Co-administrator of the site.', 'full-access'=>'no']);
        factory(\App\Role::class)->create(['name'=>'Student', 'slug'=>'student', 'description'=>'Alumnis student.', 'full-access'=>'no']);
    }
}
