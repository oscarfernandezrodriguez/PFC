<?php

use Illuminate\Database\Seeder;

class EstadoPedidoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        App\Estado_pedido::create(['usuario_id'=>1,'descripcion'=>'En proceso']);
        App\Estado_pedido::create(['usuario_id'=>1,'descripcion'=>'Cancelado']);
        App\Estado_pedido::create(['usuario_id'=>1,'descripcion'=>'Validado']);
        App\Estado_pedido::create(['usuario_id'=>1,'descripcion'=>'Siendo validación']);
        App\Estado_pedido::create(['usuario_id'=>1,'descripcion'=>'Sin pago']);
        App\Estado_pedido::create(['usuario_id'=>1,'descripcion'=>'Sin stock']);
        App\Estado_pedido::create(['usuario_id'=>1,'descripcion'=>'Pagado']);
        App\Estado_pedido::create(['usuario_id'=>1,'descripcion'=>'EnviaDO']);
        App\Estado_pedido::create(['usuario_id'=>1,'descripcion'=>'Devuelto Pago']);
        App\Estado_pedido::create(['usuario_id'=>1,'descripcion'=>'Devuelto Envío']);
        App\Estado_pedido::create(['usuario_id'=>1,'descripcion'=>'Gratis']);
        Schema::enableForeignKeyConstraints();
    }
}
