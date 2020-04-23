<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Carbon\Carbon;
use App\Transaction;
use Faker\Generator as Faker;

$factory->define(Transaction::class, function (Faker $faker) {
    return [
        'groupId' => 1,
        'subGroupId' => 1,
        'transactionDate' => Carbon::today(),
        'description' => $faker->sentence,
        'type' => 'income',
        'amount' => $faker->numberBetween(100, 10000),
        'orgId' => 1,
        'currency' => 'IDR',
        'fromAccountId' => 1,
        'toAccountId' => 2,
        'userId' => 1
    ];
});
