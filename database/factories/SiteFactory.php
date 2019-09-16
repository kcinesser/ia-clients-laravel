<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Enums\SiteStatus;
use App\Enums\Technologies;
use App\Site;
use Faker\Generator as Faker;

$factory->define(App\Site::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(4),
        'technology' => Technologies::WordPress,
        'status' => SiteStatus::Archived,
        'prev_dev' => $faker->name,
    ];
});
