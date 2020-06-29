<?php

use Illuminate\Database\Seeder;
use App\Project;
use App\JobOffer;
use App\Language;


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


        foreach(JobOffer::all() as $jobOffer) {
            $numberOfTags = rand(0,4);

            foreach(Language::all() as $key=>$language) {
                if($key <= $numberOfTags){
                    $language->jobOffer()->attach($jobOffer->id);
                }
            }

            $language->save();
        }

        foreach(Project::all() as $project) {
            $numberOfTags = rand(0,4);

            foreach(Language::all() as $key=>$language) {
                if ($key <= $numberOfTags) {
                    $language->project()->attach($project->id);
                }
            }

            $language->save();
        }

    }
}