<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidosArticuloTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos_articulo', function (Blueprint $table) {
            $table->bigIncrements('id_pedido_articulo');
            $table->bigInteger('pedido_id')->unsigned();
            $table->bigInteger('usuario_id')->unsigned();
            $table->bigInteger('articulo_id')->unsigned();
            $table->integer('unidades');
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
        Schema::dropIfExists('pedidos_articulo');
    }
}
