<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Password_usuario;
use Faker\Generator as Faker;

$factory->define(Password_usuario::class, function (Faker $faker) {
    return [
        'id_password_usuario'=> Password_usuario::count()+1,
        'usuario_id' => App\Usuario::all()->random()->id_usuario,
        'password'=> $faker->word
    ];
});
