<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Todo;
use Faker\Generator as Faker;

$factory->define(Todo::class, function (Faker $faker) {
    return [
        "title" => $faker->sentence($nbWords = 3, $variableNbWords = true),
        "user_id" =>  random_int(1, 3),
        "image_path" => " ",
    ];
});
