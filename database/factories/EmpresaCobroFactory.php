<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Empresa_cobro;
use Faker\Generator as Faker;

$factory->define(\App\Empresa_cobro::class, function (Faker $faker) {

    return [
        'usuario_id' => '1',
        'nombre_empresa' => $faker->company,
        'tipo_cobro_id' => \App\Tipos_Cobro::inRandomOrder()->get('id_tipo_cobro')[0]->id_tipo_cobro,
    ];

});
