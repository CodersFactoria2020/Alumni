<?php

use Illuminate\Database\Seeder;
use App\Tag;
use App\JobOffer;
use App\Project;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Tag::class,5)->create();

        foreach(JobOffer::all() as $jobOffer) {

            foreach(Tag::all() as $tag) {

                if (rand(1, 100) > 70) {
                        $tag->jobOffer()->attach($jobOffer->id);
                }
            }
            $tag->save();
        }

        foreach(Project::all() as $project) {

            foreach(Tag::all() as $tag) {

                if (rand(1, 100) > 70) {
                    $tag->project()->attach($project->id);
                }
             }
             $tag->save();
         }
    }
}