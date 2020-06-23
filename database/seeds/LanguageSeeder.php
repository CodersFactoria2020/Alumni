<?php

use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    public function run()
    {
        //factory(App\Language::class, 20)->create();
        factory(App\Language::class)->create(['name' => 'PHP']);
        factory(App\Language::class)->create(['name' => 'Golang']);
        factory(App\Language::class)->create(['name' => 'Javascript']);
        factory(App\Language::class)->create(['name' => 'Python']);
        factory(App\Language::class)->create(['name' => 'C#']);
        factory(App\Language::class)->create(['name' => 'C++']);
    }
}