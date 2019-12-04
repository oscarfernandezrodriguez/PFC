<?php

use Illuminate\Database\Seeder;

class ImagenesArticuloTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        App\Imagen_usuario::create(['usuario_id'=>1]);
        Schema::enableForeignKeyConstraints();
    }
}
