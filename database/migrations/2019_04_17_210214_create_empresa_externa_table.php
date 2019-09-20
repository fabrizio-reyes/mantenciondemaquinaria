<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpresaExternaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas_externas', function (Blueprint $table) {
            $table->bigIncrements('codigo');

            
            $table->string('razon_social', 200);
            $table->string('rut', 25);
            $table->string('correo', 255);
            $table->integer('telefono');
            $table->string('ciudad', 100);
            $table->string('direccion', 255);
            
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
        Schema::dropIfExists('empresas_externas');
    }
}
