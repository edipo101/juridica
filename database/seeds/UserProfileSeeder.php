<?php

use Illuminate\Database\Seeder;
use App\UserProfile;

class UserProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $profile = 'Administrador';
        UserProfile::create([
        	'name' => $profile,
        	'slug' => Str::slug($profile)
        ]);

        $profile = 'Jefe de Unidad';
        UserProfile::create([
            'name' => $profile,
            'slug' => Str::slug($profile)
        ]);

        $profile = 'Secretaria';
        UserProfile::create([
            'name' => $profile,
            'slug' => Str::slug($profile)
        ]);

        $profile = 'Técnico';
        UserProfile::create([
            'name' => $profile,
            'slug' => Str::slug($profile)
        ]);        
    }
}
