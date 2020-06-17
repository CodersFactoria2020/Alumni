<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Project;
use Faker\Generator as Faker;

$factory->define(Project::class, function (Faker $faker) {
    return [
        'title'=>$faker->catchFrase,
        'description'=>$faker->text(200),
        'repository' =>$faker->url,
        'status' =>$faker->dateOfWeek,
        'username' =>$faker->userName,
        'email' =>$faker->email
    ];
});
