<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Direccion;
use Faker\Generator as Faker;

$factory->define(\App\Direccion::class, function (Faker $faker) {
    $activo=false;
    $idUsuario=App\Usuario::all()->random()->id_usuario;
    if(\App\Direccion::where('usuario_id',$idUsuario)->count()==0){
        $activo=true;
    }

    return [
        'usuario_id' => $idUsuario,
        'calle'=>$faker->streetAddress,
        'piso'=>$faker->secondaryAddress,
        'ciudad'=>$faker->city,
        'provincia'=>$faker->state,
        'activo'=>$activo,
    ];
});
