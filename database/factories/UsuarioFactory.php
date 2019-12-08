<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Usuario::class, function (Faker $faker) {

    return [
        'email'=>$faker->unique()->safeEmail,
        'password' => bcrypt('secret'),
        'remember_token' => Str::random(),
        'nombre' => $faker->firstName,
        'apellido1' => $faker->lastName,
        'apellido2' => $faker->lastName,
        'tipo_usuario_id'=> random_int(2,\App\Tipo_Usuario::count()-1),
    ];
});
