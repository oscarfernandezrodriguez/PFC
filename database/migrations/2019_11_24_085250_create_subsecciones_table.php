<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubseccionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subsecciones', function (Blueprint $table) {
            $table->smallIncrements('id_subseccion');
            $table->smallInteger('seccion_id')->unsigned();
            $table->bigInteger('usuario_id')->unsigned();
            $table->string('descripcion', 120);
            $table->timestampsTz();
            $table->softDeletesTz();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subsecciones');
    }
}
