<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTiposCobroTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipos_cobro', function (Blueprint $table) {
            $table->smallIncrements('id_tipo_cobro');
            $table->bigInteger('usuario_id')->unsigned();
            $table->string('descripcion', 120);
            $table->decimal('precio', 5, 2);
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
        Schema::dropIfExists('tipos_cobro');
    }
}
