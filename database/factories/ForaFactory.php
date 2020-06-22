<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(App\Forum::class, function (Faker $faker) {
    return [
        'forum_category_id' => $faker->numberBetween(1,4),
        'views' => $faker->numberBetween(1,20),
        'replies' => $faker->numberBetween(1,10),
        'title' => $faker->word(),
    ];
});