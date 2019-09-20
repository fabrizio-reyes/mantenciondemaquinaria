<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->bigIncrements('codigo');
            //foraneas
            $table->unsignedBigInteger('area_codigo');
            $table->unsignedBigInteger('perfil_codigo');

            $table->string('rut',20);
            $table->string('nombre',100);
            $table->string('correo',255);
            $table->date('fecha_nacimiento');
            $table->string('cargo',100);


            $table->foreign('area_codigo')->references('codigo')->on('areas');
            $table->foreign('perfil_codigo')->references('codigo')->on('perfiles');
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
        Schema::dropIfExists('usuarios');
    }
}
