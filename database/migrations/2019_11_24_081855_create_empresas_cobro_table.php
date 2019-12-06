<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresasCobroTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas_cobro', function (Blueprint $table) {
            $table->bigIncrements('id_empresa_cobro');
            $table->bigInteger('usuario_id')->unsigned();
            $table->string('nombre_empresa', 256);
            $table->smallInteger('tipo_cobro_id')->unsigned();
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
        Schema::dropIfExists('empresas_cobro');
    }
}
