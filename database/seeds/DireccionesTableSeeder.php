<?php

use Illuminate\Database\Seeder;

class DireccionesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Direccion::class, 600)->create();
    }
}
