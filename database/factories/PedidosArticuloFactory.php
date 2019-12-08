<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use \App\Pedido_articulo;
use Faker\Generator as Faker;

$factory->define(\App\Pedido_articulo::class, function (Faker $faker) {
    static $id = 1;
    return [
        'pedido_id' => $id,
        'usuario_id' => $id++,
        'articulo_id' => App\Articulo::all()->random()->id_articulo,
        'unidades_pedido'=>$faker->randomNumber(2)
    ];
});
