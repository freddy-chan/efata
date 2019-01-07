<?php

use Faker\Generator as Faker;

$factory->define(App\Member::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'middle_name' => $faker->name,
        'last_name' => $faker->lastName,
        'gender' => 'M',
    ];
});
