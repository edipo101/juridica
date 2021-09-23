<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(User::class, function (Faker $faker) {
    $name = $faker->firstName('male');
    $lastname = $faker->lastName;
    $username = substr(strtolower($name), 0, 1).strtolower($lastname);
    return [
        'first_name' => $name,
        'second_name' => $faker->firstName('male'),
        'first_surname' => $lastname,
        'second_surname' => $faker->lastName,
    	'job_title' => $faker->sentence(3),
        'email' => strtolower($name).'.'.strtolower($lastname).'@sucre.bo',
        'username' => $username,
    	'password' => Hash::make($username),
        'profile_id' => rand(2, 4),
        'unit_id' => rand(22, 50)
    ];
});
