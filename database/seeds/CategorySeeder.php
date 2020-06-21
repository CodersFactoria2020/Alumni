<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        factory(\App\Category::class)->create(['name' => 'Laravel']);
        factory(\App\Category::class)->create(['name' => 'Angular']);
        factory(\App\Category::class)->create(['name' => 'React']);
        factory(\App\Category::class)->create(['name' => 'Vue']);
        factory(\App\Category::class)->create(['name' => 'phpMyAdmin']);
        factory(\App\Category::class)->create(['name' => 'Tutorial']);
        factory(\App\Category::class)->create(['name' => 'TDD']);
        factory(\App\Category::class)->create(['name' => 'Web Hosting']);       
        factory(\App\Category::class)->create(['name' => 'Empresas']);
        factory(\App\Category::class)->create(['name' => 'Pregunta']);
        factory(\App\Category::class)->create(['name' => 'Proyectos']);
        factory(\App\Category::class)->create(['name' => 'Rincón Chill-Out']);
    }
}