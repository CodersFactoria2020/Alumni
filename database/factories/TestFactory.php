<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Test;
use Faker\Generator as Faker;

$factory->define(test::class, function (Faker $faker) {
    return [
        'name'=>$faker->lastName,
    ];
});
