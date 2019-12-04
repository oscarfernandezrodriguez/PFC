<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Usuario::class, function (Faker $faker) {
    return [
        'nombre' => $faker->firstName,
        'apellido1' => $faker->lastName,
        'apellido2' => $faker->lastName,
        'tipo_usuario_id'=> random_int(1,\App\Tipo_Usuario::count()-1),
        'imagen_usuario_id' => factory(App\Imagen_usuario::class)->create()->id_imagen_usuario,
        'password_usuario_id' => factory(App\Password_usuario::class)->create()->id_password_usuario
    ];
});
