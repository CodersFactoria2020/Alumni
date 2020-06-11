<?php

use Faker\Generator as Faker;
use App\JobOffer;

$factory->define(JobOffer::class, function (Faker $faker) {
    return [
        'position'=>$faker->jobTitle,
        'empresa_id'=>$faker->numberBetween(1,5),
        'location'=>$faker->city,
        'description'=>$faker->text(200),
    ];
});


