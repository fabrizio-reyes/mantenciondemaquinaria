<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCentrodesaludCodigoToMaquinariasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('maquinarias', function (Blueprint $table) {
            $table->integer('centrodesalud_codigo')->after('codigo')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('maquinarias', function (Blueprint $table) {
            $table->dropColumn('centrodesalud_codigo');
        });
    }
}
