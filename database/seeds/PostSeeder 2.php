<?php
namespace App;

use Illuminate\Database\Seeder;
use App\Post;

class PostSeeder extends Seeder
{
    public function run()
    {
        factory(\App\Post::class, 10)->create();
    }
}