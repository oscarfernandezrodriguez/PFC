<?php

use Illuminate\Database\Seeder;

class PedidosArticuloTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Pedido_articulo::class, 900)->create();
    }
}
