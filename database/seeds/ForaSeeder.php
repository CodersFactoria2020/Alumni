<?php
namespace App;

use Illuminate\Database\Seeder;
use App\Forum;

class ForaSeeder extends Seeder
{
    public function run()
    {
        factory(\App\Forum::class, 5)->create();
    }
}