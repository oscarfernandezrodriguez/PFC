<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Envio;
use Faker\Generator as Faker;

$factory->define(\App\Envio::class, function (Faker $faker) {
    static $id_pedido = 1;
    return [
        'pedido_id' => $id_pedido++,
        'empresa_transporte_id' => App\Empresa_transporte::all()->random()->id_empresa_transporte,
        'estado_envio_id' => App\Estado_envio::all()->random()->id_estado_envio,
    ];
});
