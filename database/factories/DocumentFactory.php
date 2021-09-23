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
        'type_id' => rand(1, 6),
        'quote' => rand(1, 100).'/2021',
        'unit_id' => 22,
        'date' => date("Y-m-d", strtotime('2021-'.$month.'-'.$day)),
        'reference' => $faker->sentence(6),
        'description' => $faker->sentence(),
        'amount' => rand(1, 5),
        'created_by' => 2,
        'created_unit' => 22,
    ];
});
