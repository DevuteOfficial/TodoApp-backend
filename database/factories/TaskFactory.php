<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Task;
use Faker\Generator as Faker;

$factory->define(Task::class, function (Faker $faker) {
    return [
        "title" => $faker->sentence($nbWords = 4, $variableNbWords = true),
        'todo_id'=> random_int(1, 15),
    ];
});
