<?php

use Illuminate\Database\Seeder;
use App\Tag;
use App\JobOffer;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(EmpresaSeeder::class);
        $this->call(TagSeeder::class);
        $this->call(JobOfferSeeder::class);


        foreach(JobOffer::all() as $jobOffer) {

          foreach(Tag::all() as $tag) {

            if (rand(1, 100) > 70) {
                     $tag->jobOffer()->attach($jobOffer->id);
                }
             }
             $tag->save();
         }
    }
}
