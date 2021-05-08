<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Step;
use Faker\Generator as Faker;

$factory->define(Step::class, function (Faker $faker) {
    return [
        'title' => $faker->realText($maxNbChars = 30),
        'category_id' => $faker->numberBetween($min = 1, $max = 7),
        'clear_time' => '100時間',
        'tag_name1' => $faker->city,
        'tag_name2' => $faker->city,
        'tag_name3' => $faker->city,
        'content' => $faker->realText($maxNbChars = 500),
        'challenger_count' => $faker->numberBetween($min = 0, $max = 100),
        'user_id' => $faker->numberBetween($min = 1, $max = 10),
        'show_flg' => true,
        'created_at'=>$faker->dateTimeBetween('1day', '1year'),
        'updated_at'=> $faker->dateTimeBetween('1day', '1year'),
    ];
});
