<?php

use Illuminate\Database\Seeder;

class EmpresasCobroTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Empresa_cobro::class, 15)->create();
    }
}
