<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(UnitSeeder::class);
        $this->call(UserProfileSeeder::class);
        $this->call(UserSeeder::class);
        // $this->call(DocStatusSeeder::class);
        // $this->call(TypeDocSeeder::class);
        // $this->call(TypeAddSeeder::class);
        // factory(App\Document::class, 20)->create();
        // factory(App\DocRoute::class, 20)->create();
    }
}
