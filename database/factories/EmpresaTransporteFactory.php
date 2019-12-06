<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Empresa_transporte;
use Faker\Generator as Faker;

$factory->define(\App\Empresa_transporte::class, function (Faker $faker) {

    return [
        'usuario_id' => '1',
        'nombre_empresa' => $faker->company,
        'tipo_transporte_id' => \App\Tipos_Transporte::inRandomOrder()->get('id_tipo_transporte')[0]->id_tipo_transporte,
    ];
});
