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
        App\Subseccion::create(['seccion_id'=>1,'usuario_id'=>1,'descripcion_subseccion'=>'Muletas','slug_subseccion'=>'Muletas']);
        App\Subseccion::create(['seccion_id'=>1,'usuario_id'=>1,'descripcion_subseccion'=>'Andadores','slug_subseccion'=>'Andadores']);
        App\Subseccion::create(['seccion_id'=>1,'usuario_id'=>1,'descripcion_subseccion'=>'Sillas de ruedas','slug_subseccion'=>Str::slug('Sillas de ruedas','-')]);
        App\Subseccion::create(['seccion_id'=>1,'usuario_id'=>1,'descripcion_subseccion'=>'Zapatos','slug_subseccion'=>'Zapatos']);
        App\Subseccion::create(['seccion_id'=>2,'usuario_id'=>1,'descripcion_subseccion'=>'Cosmética Natural','slug_subseccion'=>Str::slug('Cosmética Natural','-')]);
        App\Subseccion::create(['seccion_id'=>2,'usuario_id'=>1,'descripcion_subseccion'=>'Cosmética Facial','slug_subseccion'=>Str::slug('Cosmética Facial','-')]);
        App\Subseccion::create(['seccion_id'=>2,'usuario_id'=>1,'descripcion_subseccion'=>'Cosmética capilar','slug_subseccion'=>Str::slug('Cosmética capilar','-')]);
        App\Subseccion::create(['seccion_id'=>3,'usuario_id'=>1,'descripcion_subseccion'=>'Chupetes','slug_subseccion'=>'Chupetes']);
        App\Subseccion::create(['seccion_id'=>3,'usuario_id'=>1,'descripcion_subseccion'=>'Biberones','slug_subseccion'=>'Biberones']);
        App\Subseccion::create(['seccion_id'=>3,'usuario_id'=>1,'descripcion_subseccion'=>'Leches infantiles','slug_subseccion'=>Str::slug('Leches infantiles','-')]);
        App\Subseccion::create(['seccion_id'=>4,'usuario_id'=>1,'descripcion_subseccion'=>'Jarabes','slug_subseccion'=>'Jarabes']);
        App\Subseccion::create(['seccion_id'=>4,'usuario_id'=>1,'descripcion_subseccion'=>'Sprays Nasal','slug_subseccion'=>Str::slug('Sprays Nasal','-')]);
        App\Subseccion::create(['seccion_id'=>4,'usuario_id'=>1,'descripcion_subseccion'=>'Gránulos','slug_subseccion'=>'Gránulos']);
        App\Subseccion::create(['seccion_id'=>5,'usuario_id'=>1,'descripcion_subseccion'=>'Bastones','slug_subseccion'=>'Bastones']);
        App\Subseccion::create(['seccion_id'=>5,'usuario_id'=>1,'descripcion_subseccion'=>'Pañales incontinencia','slug_subseccion'=>Str::slug('Pañales incontinencia','-')]);
        App\Subseccion::create(['seccion_id'=>5,'usuario_id'=>1,'descripcion_subseccion'=>'Limpiadores prótesis','slug_subseccion'=>Str::slug('Limpiadores prótesis','-')]);
        App\Subseccion::create(['seccion_id'=>5,'usuario_id'=>1,'descripcion_subseccion'=>'Cremas adhesivas','slug_subseccion'=>Str::slug('Cremas adhesivas','-')]);
        App\Subseccion::create(['seccion_id'=>6,'usuario_id'=>1,'descripcion_subseccion'=>'Higiene dental','slug_subseccion'=>Str::slug('Higiene dental','-')]);
        App\Subseccion::create(['seccion_id'=>6,'usuario_id'=>1,'descripcion_subseccion'=>'Higiene corporal','slug_subseccion'=>Str::slug('Higiene corporal','-')]);
        App\Subseccion::create(['seccion_id'=>6,'usuario_id'=>1,'descripcion_subseccion'=>'Higiene facial','slug_subseccion'=>Str::slug('Higiene facial','-')]);
        App\Subseccion::create(['seccion_id'=>7,'usuario_id'=>1,'descripcion_subseccion'=>'Complementos Dietéticos','slug_subseccion'=>Str::slug('Complementos Dietéticos','-')]);
        App\Subseccion::create(['seccion_id'=>7,'usuario_id'=>1,'descripcion_subseccion'=>'Sustitutos de comidas','slug_subseccion'=>Str::slug('Sustitutos de comidas','-')]);
        App\Subseccion::create(['seccion_id'=>7,'usuario_id'=>1,'descripcion_subseccion'=>'Infusiones','slug_subseccion'=>Str::slug('Infusiones','-')]);
        App\Subseccion::create(['seccion_id'=>8,'usuario_id'=>1,'descripcion_subseccion'=>'Gafas de sol','slug_subseccion'=>Str::slug('Gafas-de-sol','-')]);
        App\Subseccion::create(['seccion_id'=>8,'usuario_id'=>1,'descripcion_subseccion'=>'Gafas presbicia','slug_subseccion'=>Str::slug('Gafas presbicia','-')]);
        App\Subseccion::create(['seccion_id'=>8,'usuario_id'=>1,'descripcion_subseccion'=>'Limpiador gafas','slug_subseccion'=>Str::slug('Limpiador gafas','-')]);
        Schema::enableForeignKeyConstraints();
    }
}
