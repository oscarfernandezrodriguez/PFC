<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use \App\Pedido;
use Faker\Generator as Faker;

$factory->define(\App\Pedido::class, function (Faker $faker) {
    return [
        'usuario_id' => App\Usuario::all()->random()->id_usuario,
        'estado_pedido_id' => App\Estado_pedido::all()->random()->id_estado_pedido,
    ];
});
