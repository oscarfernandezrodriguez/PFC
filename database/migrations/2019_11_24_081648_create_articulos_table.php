<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticulosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articulos', function (Blueprint $table) {
            $table->bigIncrements('id_articulo');
            $table->bigInteger('usuario_id')->unsigned();
            $table->smallInteger('seccion_id')->unsigned();
            $table->smallInteger('subseccion_id')->unsigned();
            $table->string('titulo', 256);
            $table->longText('contenido');
            $table->bigInteger('imagen_articulo_id')->unsigned();
            $table->integer('unidades');
            $table->decimal('precio', 5, 2);
            $table->boolean('activo');
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
        Schema::dropIfExists('articulos');
    }
}
