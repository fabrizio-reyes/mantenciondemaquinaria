<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUbicacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ubicaciones', function (Blueprint $table) {
            $table->bigIncrements('codigo');
            $table->integer('maquinaria_codigo');
            $table->integer('centrodesalud_codigo');
            $table->integer('sala_codigo');
            $table->integer('area_codigo');
            $table->date('fecha_llegada');
            $table->date('fecha_ida')->nullable();
            $table->boolean('visible')->default(true);


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
        Schema::dropIfExists('ubicaciones');
    }
}
