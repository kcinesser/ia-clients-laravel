<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\SiteURL;
use Faker\Generator as Faker;

$factory->define(App\SiteURL::class, function (Faker $faker) {
    return [
        'url' => $faker->url,
        'type' => 0,
        'environment' => 0
    ];
});
