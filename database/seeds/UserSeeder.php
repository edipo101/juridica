<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        $user = 'admin';
        User::create([
            'first_name' => 'Administrador',
            'job_title' => 'Administrador del sistema',
            'username' => $user,
            'email' => 'admin@sucre.bo',
            'password' => Hash::make('okeymakey'),
            'profile_id' => 1,
            'avatar' => 9,
            'unit_id' => 22
        ]);

        $user = 'eporco';
        User::create([
        	'first_name' => 'Edwin',
            'second_name' => 'Gabriel',
            'first_surname' => 'Porco',
            'second_surname' => 'Mollo',
        	'job_title' => 'Responsable de Desarrollo de Sistemas',
            'username' => $user,
            'email' => 'edwin.porco@sucre.bo',
        	'password' => Hash::make('okeymakey'),
            'profile_id' => 4,
        	'avatar' => 9,
            'unit_id' => 22
        ]);
    }
}
