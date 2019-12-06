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
        App\Seccion::create(['usuario_id'=>1,'descripcion'=>'Ortopedia','slug'=>'Ortopedia' ]);
        App\Seccion::create(['usuario_id'=>1,'descripcion'=>'Dermocosmética','slug'=>'Dermocosmética']);
        App\Seccion::create(['usuario_id'=>1,'descripcion'=>'Infantil','slug'=>'Infantil']);
        App\Seccion::create(['usuario_id'=>1,'descripcion'=>'Homeopatía','slug'=>'Homeopatía']);
        App\Seccion::create(['usuario_id'=>1,'descripcion'=>'Tercera Edad','slug'=>Str::slug('Tercera Edad','-')]);
        App\Seccion::create(['usuario_id'=>1,'descripcion'=>'Higiene','slug'=>'Higiene']);
        App\Seccion::create(['usuario_id'=>1,'descripcion'=>'Nutrición','slug'=>'Nutrición']);
        App\Seccion::create(['usuario_id'=>1,'descripcion'=>'Optica','slug'=>'Optica']);
        Schema::enableForeignKeyConstraints();
    }
}
