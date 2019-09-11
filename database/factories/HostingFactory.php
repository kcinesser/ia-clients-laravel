<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Hosting;
use Faker\Generator as Faker;

$factory->define(App\Hosting::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
    ];
});
