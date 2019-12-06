<?php

use Illuminate\Database\Seeder;

class TiposTransporteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Tipos_Transporte::create(['usuario_id'=>1,'descripcion'=>'Express 24 horas','precio'=>'5.99']);
        App\Tipos_Transporte::create(['usuario_id'=>1,'descripcion'=>'Correo postal','precio'=>'2.49']);
        App\Tipos_Transporte::create(['usuario_id'=>1,'descripcion'=>'Express 24/96h','precio'=>'6.99']);
        App\Tipos_Transporte::create(['usuario_id'=>1,'descripcion'=>'Express 12 h','precio'=>'9.99']);
        App\Tipos_Transporte::create(['usuario_id'=>1,'descripcion'=>'Express 36h','precio'=>'7.49']);
        App\Tipos_Transporte::create(['usuario_id'=>1,'descripcion'=>'Entrega en tienda','precio'=>'0.00']);
    }
}
