<?php

use Faker\Generator as Faker;

$factory->define(App\Client::class, function (Faker $faker) {
    return [
    	'name' => $faker->company,
        'contact_name' => $faker->name,
        'contact_email' => $faker->email,
        'contact_phone' => $faker->phoneNumber,
        'account_manager_id' => 1
    ];
});
