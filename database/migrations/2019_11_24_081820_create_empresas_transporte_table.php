<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresasTransporteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas_transporte', function (Blueprint $table) {
            $table->bigIncrements('id_empresa_transporte');
            $table->bigInteger('usuario_id')->unsigned();
            $table->string('nombre_empresa', 256);
            $table->smallInteger('tipo_transporte_id')->unsigned();
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
        Schema::dropIfExists('empresas_transporte');
    }
}
