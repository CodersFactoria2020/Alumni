<?php

use Faker\Generator as Faker;
use App\JobOffer;

$factory->define(JobOffer::class, function (Faker $faker) {
    return [
        'position'=>$faker->jobTitle,
        'company_id'=>$faker->randomDigitNot(0),
        'location'=>$faker->city,
        'description'=>$faker->text(200),
    ];
});
