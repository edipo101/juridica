<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\DocRoute;
use Faker\Generator as Faker;

$factory->define(DocRoute::class, function (Faker $faker) {
	$prioritys = ['Alta', 'Media', 'Baja'];
    return [
        'message' => $faker->sentence(6),
        'document_id' => rand(1, 20),
        'from_id' => rand(3, 20),
        'from_unit' => rand(1, 5),
        'to_id' => 2,
        'to_unit' => 22,
        'viewed' => rand(0, 1),
        'priority' => Arr::random($prioritys),
    ];
});
