<?php
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class SeccionesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        App\Seccion::create(['usuario_id'=>1,'descripcion_seccion'=>'Ortopedia','slug_seccion'=>'Ortopedia' ]);
        App\Seccion::create(['usuario_id'=>1,'descripcion_seccion'=>'Dermocosmética','slug_seccion'=>'Dermocosmética']);
        App\Seccion::create(['usuario_id'=>1,'descripcion_seccion'=>'Infantil','slug_seccion'=>'Infantil']);
        App\Seccion::create(['usuario_id'=>1,'descripcion_seccion'=>'Homeopatía','slug_seccion'=>'Homeopatía']);
        App\Seccion::create(['usuario_id'=>1,'descripcion_seccion'=>'Tercera Edad','slug_seccion'=>Str::slug('Tercera Edad','-')]);
        App\Seccion::create(['usuario_id'=>1,'descripcion_seccion'=>'Higiene','slug_seccion'=>'Higiene']);
        App\Seccion::create(['usuario_id'=>1,'descripcion_seccion'=>'Nutrición','slug_seccion'=>'Nutrición']);
        App\Seccion::create(['usuario_id'=>1,'descripcion_seccion'=>'Optica','slug_seccion'=>'Optica']);
        Schema::enableForeignKeyConstraints();
    }
}
