<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaquinariasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maquinarias', function (Blueprint $table) {
            $table->bigIncrements('codigo');

            $table->string('id_general', 20);
            $table->string('id_inventario', 20);
            $table->string('nombre', 100);
            $table->string('descripcion',200);
            $table->enum('estado', ['activo', 'inactivo']);
            $table->date('mantenciones_preventivas');
            $table->integer('tipo_codigo');

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
            Schema::dropIfExists('maquinarias');
      
    }
}
