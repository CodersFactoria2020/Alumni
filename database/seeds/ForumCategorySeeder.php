<?php

use Illuminate\Database\Seeder;
use App\ForumCategory;

class ForumCategorySeeder extends Seeder
{
    public function run()
    {
        factory(ForumCategory::class)->create(['title' => 'General']);
        factory(ForumCategory::class)->create(['title' => 'Empresas']);
        factory(ForumCategory::class)->create(['title' => 'Proyectos']);
        factory(ForumCategory::class)->create(['title' => 'Rincón chill-out']);
    }
}