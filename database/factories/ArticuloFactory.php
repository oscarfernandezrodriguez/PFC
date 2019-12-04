<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Articulo;
use Faker\Generator as Faker;

$factory->define(App\Articulo::class, function (Faker $faker) {
        //Calculamos la sección y subseccion
        $Seccion=App\Seccion::all()->random(1)->first();
        $Subseccion=App\Subseccion::inRandomOrder()->where('seccion_id',$Seccion->id_seccion)->first();
        $titulo=$faker->text(40);
         return [
               'usuario_id'=> 1,
               'seccion_id' => $Seccion->id_seccion,
               'subseccion_id' => $Subseccion->id_subseccion,
               'titulo'=>  $titulo,
               'contenido'=> $faker ->paragraph,
               'imagen_articulo_id' => factory(App\Imagen_articulo::class)->create()->id_imagen_articulo,
                'unidades'=> $faker->randomNumber(2),
               'precio'=>$faker->randomFloat(2,0,50),
              'slug'=>Str::slug($titulo, '-')

           ];
});
