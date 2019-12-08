<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use \App\Pedido;
use Faker\Generator as Faker;

$factory->define(\App\Pedido::class, function (Faker $faker) {
    static $usuario=1;
    return [
        'usuario_id' => $usuario++,
        'estado_pedido_id' => $faker->numberBetween(2,11),
    ];
});
