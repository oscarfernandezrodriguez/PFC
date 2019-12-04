<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Imagen_articulo;
use Faker\Generator as Faker;

$factory->define(App\Imagen_articulo::class, function (Faker $faker) {
    return [
        'id_imagen_articulo'=> Imagen_articulo::count()+1,
        'usuario_id' => App\Usuario::all()->random()->id_usuario,
        'articulo_id' => App\Articulo::all()->random()->id_articulo,
    ];
});
