<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Tarjeta;
use Faker\Generator as Faker;

$factory->define(\App\Tarjeta::class, function (Faker $faker) {
    $idUser=App\Usuario::all()->random()->id_usuario;
    $activo=false;
    if(App\Tarjeta::where('usuario_id',$idUser)->count()==0){
        $activo=true;
    }
    return [
        'usuario_id'=> $idUser,
        'numero_tarjeta'=>bcrypt('4910062406679176'),
        'mes'=>$faker->month,
        'ano'=>$faker->year,
        'cvv2'=>$faker->randomNumber(3),
        'activo'=>$activo,
    ];
});
