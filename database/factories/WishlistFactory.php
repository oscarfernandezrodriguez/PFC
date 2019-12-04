<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Wishlist;
use Faker\Generator as Faker;

$factory->define(App\Wishlist::class, function (Faker $faker) {
    return [
        'usuario_id' => App\Usuario::all()->random()->id_usuario,
        'articulo_id' => App\Articulo::all()->random()->id_articulo,
    ];
});
