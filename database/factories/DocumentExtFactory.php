<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Document;
use Faker\Generator as Faker;
use Carbon\Carbon;

$factory->define(Document::class, function (Faker $faker) {
    $month = rand(1, 12);
    $month = ($month < 10) ? '0'.$month : $month;
    $day = rand(1, 31);
    $day = ($day < 10) ? '0'.$day : $day;
    return [
        'entry_number' => rand(1, 20),
        'entry_date' => Carbon::today()->subDays(rand(0, 365)),
        'type_id' => rand(1, 4),
        'quote' => rand(1, 100).'/2021',
        'unit_id' => rand(1, 50),
        'add_type_id' => rand(1, 3),
        'add_data' => rand(1, 100),
        'date' => date("Y-m-d", strtotime('2021-'.$month.'-'.$day)),
        'reference' => $faker->sentence(6),
        'description' => $faker->sentence(),
        'amount' => rand(1, 5),
        'created_by' => 2,
        'created_unit' => 22,
    ];
});
