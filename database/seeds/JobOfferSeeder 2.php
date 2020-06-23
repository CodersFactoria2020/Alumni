<?php

use Illuminate\Database\Seeder;
use App\JobOffer;

class JobOfferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(JobOffer::class,5)->create();
    }
}
