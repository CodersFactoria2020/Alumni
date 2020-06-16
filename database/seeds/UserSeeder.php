<?php
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        factory(\App\User::class)->create(['name'=>'admin','email'=>'admin@gmail.com','access'=>'yes','password' => Hash::make('password')]);
        factory(\App\User::class)->create(['name'=>'Alejandro Acho','email'=>'alejo@acho.com','access'=>'yes','password' => Hash::make('password')]);
        factory(\App\User::class)->create(['name'=>'Acho','email'=>'a@a.com','access'=>'yes','password' => Hash::make('password')]);
        factory(\App\User::class)->create(['name'=>'Alex','email'=>'a@x.com','access'=>'no','password' => Hash::make('password')]);
        factory(\App\User::class)->create(['name'=>'mounir','email'=>'mounir@factoriaf5.com','access'=>'no','password' => Hash::make('password')]);
        factory(\App\User::class,7)->create();
    }
}
