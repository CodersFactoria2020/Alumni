<?php
namespace App;

use Illuminate\Database\Seeder;
use App\Thread;

class ThreadSeeder extends Seeder
{
    public function run()
    {
        factory(\App\Thread::class, 10)->create();
    }
}