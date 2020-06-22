<?php

use Illuminate\Database\Seeder;
use App\ForumCategory;

class ForumCategorySeeder extends Seeder
{
    public function run()
    {
        factory(App\ForumCategory::class)->create(['title' => 'General']);
        factory(App\ForumCategory::class)->create(['title' => 'Empresas']);
        factory(App\ForumCategory::class)->create(['title' => 'Proyectos']);
        factory(App\ForumCategory::class)->create(['title' => 'Rincón chill-out']);
    }
}