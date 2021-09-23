<?php

use Illuminate\Database\Seeder;
use App\TypeDoc;

class TypeDocSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$name = 'Solicitud';
        TypeDoc::create([
        	'name' => $name,
        	'slug' => Str::slug($name),
            'label' => 'danger'
        ]);

        $name = 'Respuesta a solicitud';
        TypeDoc::create([
            'name' => $name,
            'slug' => Str::slug($name),
            'label' => 'danger'
        ]);

        $name = 'Informe';
        TypeDoc::create([
        	'name' => $name,
        	'slug' => Str::slug($name),
            'label' => 'primary'
        ]);

        $name = 'Circular';
        TypeDoc::create([
        	'name' => $name,
        	'slug' => Str::slug($name),
            'label' => 'success'
        ]);

        $name = 'Nota';
        TypeDoc::create([
            'name' => $name,
            'slug' => Str::slug($name),
            'label' => 'success'
        ]);

        $name = 'Comunicación interna';
        TypeDoc::create([
            'name' => $name,
            'slug' => Str::slug($name),
            'label' => 'success'
        ]);
    }
}
