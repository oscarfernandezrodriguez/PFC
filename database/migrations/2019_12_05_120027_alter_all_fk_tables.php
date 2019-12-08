<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterAllFkTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('imagenes_articulo', function ($table) {
            $table->foreign('usuario_id')->references('id_usuario')->on('usuarios')->onDelete('cascade');
        });
        Schema::table('estado_pedido', function ($table) {
            $table->foreign('usuario_id')->references('id_usuario')->on('usuarios')->onDelete('cascade');
        });
        Schema::table('subsecciones', function ($table) {
            $table->foreign('usuario_id')->references('id_usuario')->on('usuarios')->onDelete('cascade');
            $table->foreign('seccion_id')->references('id_seccion')->on('secciones')->onDelete('cascade');
        });
        Schema::table('estado_envio', function ($table) {
            $table->foreign('usuario_id')->references('id_usuario')->on('usuarios')->onDelete('cascade');
        });
        Schema::table('estado_cobro', function ($table) {
            $table->foreign('usuario_id')->references('id_usuario')->on('usuarios')->onDelete('cascade');
        });
        Schema::table('tipos_transporte', function ($table) {
            $table->foreign('usuario_id')->references('id_usuario')->on('usuarios')->onDelete('cascade');
        });
        Schema::table('tipos_cobro', function ($table) {
            $table->foreign('usuario_id')->references('id_usuario')->on('usuarios')->onDelete('cascade');
        });
        Schema::table('wishlists', function ($table) {
            $table->foreign('usuario_id')->references('id_usuario')->on('usuarios')->onDelete('cascade');
            $table->foreign('articulo_id')->references('id_articulo')->on('articulos')->onDelete('cascade');
        });
        Schema::table('comentarios', function ($table) {
            $table->foreign('usuario_id')->references('id_usuario')->on('usuarios')->onDelete('cascade');
            $table->foreign('articulo_id')->references('id_articulo')->on('articulos')->onDelete('cascade');
        });
        Schema::table('empresas_cobro', function ($table) {
            $table->foreign('usuario_id')->references('id_usuario')->on('usuarios')->onDelete('cascade');
            $table->foreign('tipo_cobro_id')->references('id_tipo_cobro')->on('tipos_cobro')->onDelete('cascade');
        });
        Schema::table('empresas_transporte', function ($table) {
            $table->foreign('usuario_id')->references('id_usuario')->on('usuarios')->onDelete('cascade');
            $table->foreign('tipo_transporte_id')->references('id_tipo_transporte')->on('tipos_transporte')->onDelete('cascade');
        });
        Schema::table('envios', function ($table) {
            $table->foreign('pedido_id')->references('id_pedido')->on('pedidos')->onDelete('cascade');
            $table->foreign('empresa_transporte_id')->references('id_empresa_transporte')->on('empresas_transporte')->onDelete('cascade');
            $table->foreign('estado_envio_id')->references('id_estado_envio')->on('estado_envio')->onDelete('cascade');
            $table->foreign('tipo_transporte_id')->references('id_tipo_transporte')->on('tipos_transporte')->onDelete('cascade');
        });
        Schema::table('cobros', function ($table) {
            $table->foreign('pedido_id')->references('id_pedido')->on('pedidos')->onDelete('cascade');
            $table->foreign('empresa_cobro_id')->references('id_empresa_cobro')->on('empresas_cobro')->onDelete('cascade');
            $table->foreign('estado_cobro_id')->references('id_estado_cobro')->on('estado_cobro')->onDelete('cascade');
            $table->foreign('tipo_cobro_id')->references('id_tipo_cobro')->on('tipos_cobro')->onDelete('cascade');
        });
        Schema::table('secciones', function ($table) {
            $table->foreign('usuario_id')->references('id_usuario')->on('usuarios')->onDelete('cascade');
        });
        Schema::table('articulos', function ($table) {
            $table->foreign('usuario_id')->references('id_usuario')->on('usuarios')->onDelete('cascade');
            $table->foreign('seccion_id')->references('id_seccion')->on('secciones')->onDelete('cascade');
            $table->foreign('subseccion_id')->references('id_subseccion')->on('subsecciones')->onDelete('cascade');
            $table->foreign('imagen_articulo_id')->references('id_imagen_articulo')->on('imagenes_articulo')->onDelete('cascade');
        });
        Schema::table('pedidos_articulo', function ($table) {
            $table->foreign('pedido_id')->references('id_pedido')->on('pedidos')->onDelete('cascade');
            $table->foreign('usuario_id')->references('id_usuario')->on('usuarios')->onDelete('cascade');
            $table->foreign('articulo_id')->references('id_articulo')->on('articulos')->onDelete('cascade');
            ;
        });
        Schema::table('pedidos', function ($table) {
            $table->foreign('usuario_id')->references('id_usuario')->on('usuarios')->onDelete('cascade');
            $table->foreign('estado_pedido_id')->references('id_estado_pedido')->on('estado_pedido')->onDelete('cascade');

        });
        Schema::table('tarjetas', function ($table) {
            $table->foreign('usuario_id')->references('id_usuario')->on('usuarios')->onDelete('cascade');
        });
        Schema::table('direcciones', function ($table) {
            $table->foreign('usuario_id')->references('id_usuario')->on('usuarios')->onDelete('cascade');
        });
        Schema::table('tipos_usuario', function ($table) {
            $table->foreign('usuario_id')->references('id_usuario')->on('usuarios')->onDelete('cascade');
        });
        Schema::table('usuarios', function ($table) {
            $table->foreign('tipo_usuario_id')->references('id_tipo_usuario')->on('tipos_usuario')->onDelete('cascade');
        });
        Schema::table('password_resets', function ($table) {
            $table->foreign('email')->references('email')->on('usuarios')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('imagenes_articulo', function ($table) {
            $table->dropForeign('imagenes_articulo_usuario_id_foreign');
        });
        Schema::table('estado_pedido', function ($table) {
            $table->dropForeign('estado_pedido_usuario_id_foreign');
        });
        Schema::table('subsecciones', function ($table) {
            $table->dropForeign('subsecciones_usuario_id_foreign');
            $table->dropForeign('subsecciones_seccion_id_foreign');
        });
        Schema::table('estado_envio', function ($table) {
            $table->dropForeign('estado_envio_usuario_id_foreign');
        });
        Schema::table('estado_cobro', function ($table) {
            $table->dropForeign('estado_cobro_usuario_id_foreign');
        });
        Schema::table('tipos_transporte', function ($table) {
            $table->dropForeign('tipos_transporte_usuario_id_foreign');
        });
        Schema::table('tipos_cobro', function ($table) {
            $table->dropForeign('tipos_cobro_usuario_id_foreign');
        });
        Schema::table('wishlists', function ($table) {
            $table->dropForeign('wishlists_usuario_id_foreign');
            $table->dropForeign('wishlists_articulo_id_foreign');
        });
        Schema::table('comentarios', function ($table) {
            $table->dropForeign('comentarios_usuario_id_foreign');
            $table->dropForeign('comentarios_articulo_id_foreign');
        });
        Schema::table('empresas_cobro', function ($table) {
            $table->dropForeign('empresas_cobro_usuario_id_foreign');
            $table->dropForeign('empresas_cobro_tipo_cobro_id_foreign');
        });
        Schema::table('empresas_transporte', function ($table) {
            $table->dropForeign('empresas_transporte_usuario_id_foreign');
            $table->dropForeign('empresas_transporte_tipo_transporte_id_foreign');
        });
        Schema::table('envios', function ($table) {
            $table->dropForeign('envios_pedido_id_foreign');
            $table->dropForeign('envios_empresa_transporte_id_foreign');
            $table->dropForeign('envios_estado_envio_id_foreign');
            $table->dropForeign('envios_tipo_transporte_id_foreign');
        });
        Schema::table('cobros', function ($table) {
            $table->dropForeign('cobros_pedido_id_foreign');
            $table->dropForeign('cobros_empresa_cobro_id_foreign');
            $table->dropForeign('cobros_estado_cobro_id_foreign');
            $table->dropForeign('cobros_tipo_cobro_id_foreign');
        });
        Schema::table('secciones', function ($table) {
            $table->dropForeign('secciones_usuario_id_foreign');
        });
        Schema::table('articulos', function ($table) {
            $table->dropForeign('articulos_usuario_id_foreign');
            $table->dropForeign('articulos_seccion_id_foreign');
            $table->dropForeign('articulos_subseccion_id_foreign');
            $table->dropForeign('articulos_imagen_articulo_id_foreign');
        });
        Schema::table('pedidos_articulo', function ($table) {
            $table->dropForeign('pedidos_articulo_pedido_id_foreign');
            $table->dropForeign('pedidos_articulo_usuario_id_foreign');
            $table->dropForeign('pedidos_articulo_articulo_id_foreign');
        });
        Schema::table('pedidos', function ($table) {
            $table->dropForeign('pedidos_usuario_id_foreign');
            $table->dropForeign('pedidos_estado_pedido_id_foreign');

        });
        Schema::table('tarjetas', function ($table) {
            $table->dropForeign('tarjetas_usuario_id_foreign');
        });
        Schema::table('direcciones', function ($table) {
            $table->dropForeign('direcciones_usuario_id_foreign');
        });
        Schema::table('tipos_usuario', function ($table) {
            $table->dropForeign('tipos_usuario_usuario_id_foreign');
        });
        Schema::table('usuarios', function ($table) {
            $table->dropForeign('usuarios_tipo_usuario_id_foreign');
        });
        Schema::table('password_resets', function ($table) {
            $table->dropForeign('password_resets_email_foreign');
        });
    }
}
