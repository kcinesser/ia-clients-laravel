<?php

use Faker\Generator as Faker;

$factory->define(App\Job::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'description' => $faker->sentence(4)
    ];
});
