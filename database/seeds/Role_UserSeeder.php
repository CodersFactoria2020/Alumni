<?php
use App\User;

use Illuminate\Database\Seeder;

class Role_UserSeeder extends Seeder
{

    public function run()
    {
        for ($i=1; $i <=1; $i++){
            $user = User::find($i);
            $user->roles()->sync([1]);
        }

        for ($i=2; $i <3; $i++){
            $user = User::find($i);
            $user->roles()->sync([2]);
        }

        for ($i=3; $i<=50; $i++){
            if (User::find($i)){
                $user = User::find($i);
                $user->roles()->sync([3]);
            }
        }
    }
}
