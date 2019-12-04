<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comentario;
use Faker\Generator as Faker;

$factory->define(App\Comentario::class, function (Faker $faker) {
    return [
        'usuario_id' => App\Usuario::all()->random()->id_usuario,
        'articulo_id' => App\Articulo::all()->random()->id_articulo,
        'titulo'=> $faker->text(120),
        'contenido'=> $faker->realText(1200),
    ];
});
