<?php

use Illuminate\Database\Seeder;
use App\TypeAdd;

class TypeAddSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TypeAdd::create([
        	'name' => 'RUPE'
        ]);

        TypeAdd::create([
        	'name' => 'CUCE'
        ]);

        TypeAdd::create([
        	'name' => 'Preventivo'
        ]);
    }
}
