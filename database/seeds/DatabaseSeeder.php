<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
<<<<<<< HEAD
        $this->call(LanguageSeeder::class);
=======
        // $this->call(UserSeeder::class);
        $this->call(CategorySeeder::class);
>>>>>>> CrudCategoria
    }
}
