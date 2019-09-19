<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Enums\RemoteDomainsProviders;
use App\Model;
use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'name' => $faker->domainName,
        'exp_date' => $faker->date,
        'remote_provider_id' => $faker->randomNumber(5),
        'remote_provider_type' => RemoteDomainsProviders::GoDaddy,
    ];
});
