<?php

use Illuminate\Database\Seeder;

class EmpresasTransporteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Empresa_transporte::class, 15)->create();
    }
}
