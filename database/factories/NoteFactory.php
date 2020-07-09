<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Note;
use Faker\Generator as Faker;

$factory->define(Note::class, function (Faker $faker) {
    return [
        "note" => $faker->sentence($nbWords = 5, $variableNbWords = true),
        'task_id' => random_int(1, 15),
    ];
});
