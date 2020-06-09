<?php

use Illuminate\Database\Seeder;
use App\Test;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Test::class,10)->create();
    }
}
