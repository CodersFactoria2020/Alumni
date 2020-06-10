<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\empresa;
use Faker\Generator as Faker;

$factory->define(Empresa::class, function (Faker $faker) {
    return [
        'name' => $faker -> name,
        'description' => $faker -> realText($maxNbChars = 10, $indexSize = 5),
        'logo' => $faker -> imageUrl($width = 640, $height = 480),
    ];
});
