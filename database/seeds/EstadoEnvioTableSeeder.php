<?php

use Illuminate\Database\Seeder;

class EstadoEnvioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        App\Estado_envio::create(['usuario_id'=>1,'descripcion'=>'En preparación']);
        App\Estado_envio::create(['usuario_id'=>1,'descripcion'=>'En almacen']);
        App\Estado_envio::create(['usuario_id'=>1,'descripcion'=>'En empresa de transporte']);
        App\Estado_envio::create(['usuario_id'=>1,'descripcion'=>'En tránsito']);
        App\Estado_envio::create(['usuario_id'=>1,'descripcion'=>'En reparto']);
        App\Estado_envio::create(['usuario_id'=>1,'descripcion'=>'Entregado']);
        Schema::enableForeignKeyConstraints();

    }
}
