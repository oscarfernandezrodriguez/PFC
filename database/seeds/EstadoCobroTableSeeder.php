<?php

use Illuminate\Database\Seeder;

class EstadoCobroTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        App\Estado_cobro::create(['usuario_id'=>1,'descripcion'=>'Pendiente']);
        App\Estado_cobro::create(['usuario_id'=>1,'descripcion'=>'Pagado']);
        App\Estado_cobro::create(['usuario_id'=>1,'descripcion'=>'Devuelto']);
        App\Estado_cobro::create(['usuario_id'=>1,'descripcion'=>'Gratis']);
        Schema::enableForeignKeyConstraints();


    }
}
