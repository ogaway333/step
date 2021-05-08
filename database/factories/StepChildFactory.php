<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\StepChild;
use Faker\Generator as Faker;

$factory->define(StepChild::class, function (Faker $faker) {
    return [
        'title' => $faker->realText($maxNbChars = 30),
        'content' => $faker->realText($maxNbChars = 500),
        'step_id' => $faker->numberBetween($min = 1, $max = 100),
    ];
});
