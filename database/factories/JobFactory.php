<?php

use Faker\Generator as Faker;
use App\Client;

$factory->define(App\Job::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'description' => $faker->sentence(4),
        'client_id' => 1,
    ];
});
