<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Client;
use App\Enums\ClientStatus;
use Faker\Generator as Faker;

$factory->define(Client::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence,
        'contact_name' => $faker->sentence,
        'contact_email' => $faker->safeEmail,
        'contact_phone' => $faker->phoneNumber,
        'account_manager_id' => 1,
        'status' => ClientStatus::Archived
    ];
});
