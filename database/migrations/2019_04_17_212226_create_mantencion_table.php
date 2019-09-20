<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMantencionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mantenciones', function (Blueprint $table) {
            $table->bigIncrements('codigo');

            $table->unsignedBigInteger('maquinaria_codigo');
            $table->unsignedBigInteger('empresa_externa_codigo');
            
            $table->date('fecha');
            $table->integer('valor');
            $table->string('descripcion', 500);

            $table->foreign('maquinaria_codigo')->references('codigo')->on('maquinarias');
            $table->foreign('empresa_externa_codigo')->references('codigo')->on('empresas_externas');
            


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
        Schema::dropIfExists('mantenciones');
    }
}
