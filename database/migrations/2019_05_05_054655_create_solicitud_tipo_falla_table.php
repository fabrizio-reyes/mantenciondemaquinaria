<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSolicitudTipoFallaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitud_tipo_falla', function (Blueprint $table) {
            $table->bigIncrements('codigo');

            $table->integer('solicitud_codigo');
            $table->integer('tipo_falla_codigo');

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
        Schema::dropIfExists('solicitud_tipo_falla');
    }
}
