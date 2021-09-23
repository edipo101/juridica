<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDenunciationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('denunciations', function (Blueprint $table) {
            $table->id();
            $table->string('informer'); //Denunciante
            $table->string('denounced'); //Denunciado
            $table->date('entry_date')->nullable(); //Fecha de ingreso
            $table->string('fis'); //Número de fIS
            $table->string('ianus')->nullable();
            $table->string('nurej')->nullable();
            $table->string('tribunal')->nullable(); //Juzgado o tribunal
            $table->string('stage')->nullable(); //Etapa
            $table->text('facts')->nullable(); //Breve relación de hechos
            $table->text('actions_done')->nullable(); //Acciones realizadas
            $table->text('state')->nullable(); //Estado actual
            $table->text('actions_follow')->nullable(); //Acciones a seguir
            $table->boolean('data_sheet')->default(0); //Ficha técnica
            $table->text('observations')->nullable(); //Observaciones
            $table->string('pages')->nullable(); //Número de fojas
            $table->string('several')->nullable(); //Varios: cuantía, coactivos, civiles y otros
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('denunciations');
    }
}
