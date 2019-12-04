<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class SubseccionesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        App\Subseccion::create(['seccion_id'=>1,'usuario_id'=>1,'descripcion'=>'Muletas','slug'=>'Muletas']);
        App\Subseccion::create(['seccion_id'=>1,'usuario_id'=>1,'descripcion'=>'Andadores','slug'=>'Andadores']);
        App\Subseccion::create(['seccion_id'=>1,'usuario_id'=>1,'descripcion'=>'Sillas de ruedas','slug'=>Str::slug('Sillas de ruedas','-')]);
        App\Subseccion::create(['seccion_id'=>1,'usuario_id'=>1,'descripcion'=>'Zapatos','slug'=>'Zapatos']);
        App\Subseccion::create(['seccion_id'=>2,'usuario_id'=>1,'descripcion'=>'Cosmética Natural','slug'=>Str::slug('Cosmética Natural','-')]);
        App\Subseccion::create(['seccion_id'=>2,'usuario_id'=>1,'descripcion'=>'Cosmética Facial','slug'=>Str::slug('Cosmética Facial','-')]);
        App\Subseccion::create(['seccion_id'=>2,'usuario_id'=>1,'descripcion'=>'Cosmética capilar','slug'=>Str::slug('Cosmética capilar','-')]);
        App\Subseccion::create(['seccion_id'=>3,'usuario_id'=>1,'descripcion'=>'Chupetes','slug'=>'Chupetes']);
        App\Subseccion::create(['seccion_id'=>3,'usuario_id'=>1,'descripcion'=>'Biberones','slug'=>'Biberones']);
        App\Subseccion::create(['seccion_id'=>3,'usuario_id'=>1,'descripcion'=>'Leches infantiles','slug'=>Str::slug('Leches infantiles','-')]);
        App\Subseccion::create(['seccion_id'=>4,'usuario_id'=>1,'descripcion'=>'Jarabes','slug'=>'Jarabes']);
        App\Subseccion::create(['seccion_id'=>4,'usuario_id'=>1,'descripcion'=>'Sprays Nasal','slug'=>Str::slug('Sprays Nasal','-')]);
        App\Subseccion::create(['seccion_id'=>4,'usuario_id'=>1,'descripcion'=>'Gránulos','slug'=>'Gránulos']);
        App\Subseccion::create(['seccion_id'=>5,'usuario_id'=>1,'descripcion'=>'Bastones','slug'=>'Bastones']);
        App\Subseccion::create(['seccion_id'=>5,'usuario_id'=>1,'descripcion'=>'Pañales incontinencia','slug'=>Str::slug('Pañales incontinencia','-')]);
        App\Subseccion::create(['seccion_id'=>5,'usuario_id'=>1,'descripcion'=>'Limpiadores prótesis','slug'=>Str::slug('Limpiadores prótesis','-')]);
        App\Subseccion::create(['seccion_id'=>5,'usuario_id'=>1,'descripcion'=>'Cremas adhesivas','slug'=>Str::slug('Cremas adhesivas','-')]);
        App\Subseccion::create(['seccion_id'=>6,'usuario_id'=>1,'descripcion'=>'Higiene dental','slug'=>Str::slug('Higiene dental','-')]);
        App\Subseccion::create(['seccion_id'=>6,'usuario_id'=>1,'descripcion'=>'Higiene corporal','slug'=>Str::slug('Higiene corporal','-')]);
        App\Subseccion::create(['seccion_id'=>6,'usuario_id'=>1,'descripcion'=>'Higiene facial','slug'=>Str::slug('Higiene facial','-')]);
        App\Subseccion::create(['seccion_id'=>7,'usuario_id'=>1,'descripcion'=>'Complementos Dietéticos','slug'=>Str::slug('Complementos Dietéticos','-')]);
        App\Subseccion::create(['seccion_id'=>7,'usuario_id'=>1,'descripcion'=>'Sustitutos de comidas','slug'=>Str::slug('Sustitutos de comidas','-')]);
        App\Subseccion::create(['seccion_id'=>7,'usuario_id'=>1,'descripcion'=>'Infusiones','slug'=>Str::slug('Infusiones','-')]);
        App\Subseccion::create(['seccion_id'=>8,'usuario_id'=>1,'descripcion'=>'Gafas de sol','slug'=>Str::slug('Gafas-de-sol','-')]);
        App\Subseccion::create(['seccion_id'=>8,'usuario_id'=>1,'descripcion'=>'Gafas presbicia','slug'=>Str::slug('Gafas presbicia','-')]);
        App\Subseccion::create(['seccion_id'=>8,'usuario_id'=>1,'descripcion'=>'Limpiador gafas','slug'=>Str::slug('Limpiador gafas','-')]);
        Schema::enableForeignKeyConstraints();
    }
}
