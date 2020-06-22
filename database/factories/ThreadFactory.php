<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(App\Thread::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween(1,5),
        'forum_id' => $faker->numberBetween(1,5),
        'replies' => $faker->numberBetween(1,10),
        'title' => $faker->realText($maxNbChars = 30, $indexSize = 2),
    ];
});