<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\HostedDomain;
use Faker\Generator as Faker;
use Carbon\Carbon;

$factory->define(HostedDomain::class, function (Faker $faker) {
    return [
        'name' => $faker->domainName,
        'exp_date' => Carbon::now()->addYear(1)
    ];
});
