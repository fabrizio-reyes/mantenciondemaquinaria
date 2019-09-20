<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCentrodesaludTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('centrodesalud', function (Blueprint $table) {
            $table->bigIncrements('codigo');
            $table->string('nombre', 150);
            $table->string('descripcion', 500);
            $table->string('correo',255);
            $table->integer('telefono');
            $table->string('ciudad',100);
            $table->string('direccion', 150);

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
        Schema::dropIfExists('centrodesalud');
    }
}
