<?php

use Illuminate\Database\Seeder;
use App\DocStatus;

class DocStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DocStatus::create([
        	'name' => 'Creado'
        ]);

        DocStatus::create([
            'name' => 'Enviado'
        ]);

        DocStatus::create([
        	'name' => 'Borrador'
        ]);

        DocStatus::create([
        	'name' => 'Archivado'
        ]);

        DocStatus::create([
        	'name' => 'Eliminado'
        ]);
    }
}
