<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Denunciation;
use Faker\Generator as Faker;

$factory->define(Denunciation::class, function (Faker $faker) {
    $month = rand(1, 12);
    $month = ($month < 10) ? '0'.$month : $month;
    $day = rand(1, 31);
    $day = ($day < 10) ? '0'.$day : $day;
    return [
        'informer' => 'GAMS',
        'denounced' => $faker->name,
        'entry_date' => date("Y-m-d", strtotime('2021-'.$month.'-'.$day)),
        'fis' => $faker->ean8,
        'ianus' => $faker->ean8,
        'nurej' => $faker->ean8,
        'tribunal' => $faker->sentence(4),
        'stage' => $faker->sentence(3),
        'facts' => $faker->text,
        'actions_done' => $faker->text,
        'state' => $faker->sentence(4),
        'actions_follow' => $faker->text,
        'observations' => $faker->text,
        'several' => $faker->text
    ];
});
