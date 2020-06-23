<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween(1,10),
        'thread_id' => $faker->numberBetween(1,5),
        'body' => $faker->realText($maxNbChars = 200, $indexSize = 2),
    ];
});