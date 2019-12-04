<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Imagen_usuario;
use Faker\Generator as Faker;

$factory->define(Imagen_usuario::class, function (Faker $faker) {
    return [
        'id_imagen_usuario'=> Imagen_usuario::count()+1,
        'usuario_id' => App\Usuario::all()->random()->id_usuario,
    ];
});
