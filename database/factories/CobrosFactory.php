<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Cobro;
use Faker\Generator as Faker;

$factory->define(\App\Cobro::class, function (Faker $faker) {
    static $id = 1;
    return [
        'pedido_id' => $id++,
        'empresa_cobro_id' => App\Empresa_cobro::all()->random()->id_empresa_cobro,
        'estado_cobro_id' => App\Estado_cobro::all()->random()->id_estado_cobro,
        'tipo_cobro_id' => App\Tipos_Cobro::all()->random()->id_tipo_cobro,
    ];
});

