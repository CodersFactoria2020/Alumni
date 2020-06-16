<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(PermissionSeeder::class);

        $this->call(Role_UserSeeder::class);
        $this->call(Permission_RoleSeeder::class);
    }
}
