<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Empresa;
use Faker\Generator as Faker;

$factory->define(Empresa::class, function (Faker $faker) {
    return [
        'name' => $faker -> name,
        'description' => $faker -> realText($maxNbChars = 500, $indexSize = 5),
    ];
});