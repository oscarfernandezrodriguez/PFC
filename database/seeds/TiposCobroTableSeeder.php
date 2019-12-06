<?php

use Illuminate\Database\Seeder;

class TiposCobroTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Tipos_Cobro::create(['usuario_id'=>1,'descripcion'=>'Tarjeta de crédito','precio'=>'5.99']);
        App\Tipos_Cobro::create(['usuario_id'=>1,'descripcion'=>'Transferencia Bancaria','precio'=>'2.49']);
        App\Tipos_Cobro::create(['usuario_id'=>1,'descripcion'=>'Giro postal','precio'=>'6.99']);
        App\Tipos_Cobro::create(['usuario_id'=>1,'descripcion'=>'Pago en puerta','precio'=>'9.99']);
        App\Tipos_Cobro::create(['usuario_id'=>1,'descripcion'=>'Paypal','precio'=>'7.49']);
    }
}
