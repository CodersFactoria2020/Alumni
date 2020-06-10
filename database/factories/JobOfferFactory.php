<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\JobOffer;

$factory->define(JobOffer::class, function (Faker $faker) {
    return [
        'name'=>$faker->lastName,
    ];
});
