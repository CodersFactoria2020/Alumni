<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Project;
use Faker\Generator as Faker;

$factory->define(Project::class, function (Faker $faker) {
    $statusList = ['In progress', 'Paused', 'Achieved all goals'];
    return [
        'title'=>$faker->catchPhrase,
        'description'=>$faker->text(1000),
        'repository' =>$faker->url,
        'status' =>$statusList[rand(0,2)],
        'username' =>$faker->userName,
        'email' =>$faker->email
    ];
});
