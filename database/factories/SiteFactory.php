<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Site;
use Faker\Generator as Faker;

$factory->define(App\Site::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(4),
        'technology' => 0,
        'status' => 0,
        'prev_dev' => $faker->name,
    ];
});