<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Carbon\Carbon;
use App\Attendance;
use App\Member;
use Faker\Generator as Faker;

$factory->define(Attendance::class, function (Faker $faker) {
    return [
        'member_id' => function() {
            return factory(Member::class)->create()->id;
        },
        'date' => Carbon::now(),
    ];
});
