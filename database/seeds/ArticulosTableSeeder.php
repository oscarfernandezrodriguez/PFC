<?php
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class ArticulosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        App\Articulo::create(['usuario_id'=>1,'seccion_id'=>1,'subseccion_id'=>1,'titulo'=>'cepillo de dientes','contenido'=>'Es un cepillo muy bueno!','imagen_articulo_id'=>1,'unidades'=>3,'precio'=>5.20,'slug'=>Str::slug('cepillo de dientes', '-')]);
        Schema::enableForeignKeyConstraints();
            factory(App\Articulo::class, 500)->create();
    }
}
