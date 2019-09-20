<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaquinariaConvenioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maquinaria_convenio', function (Blueprint $table) {
            
            $table->bigIncrements('codigo');

            $table->unsignedBigInteger('convenio_codigo');
            $table->unsignedBigInteger('maquinaria_codigo');

            $table->timestamps();
            $table->boolean('visible')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('maquinaria_convenio');
    }
}
