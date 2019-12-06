<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Banco;
use Faker\Generator as Faker;

$factory->define(\App\Banco::class, function (Faker $faker) {
    $idUser=App\Usuario::all()->random()->id_usuario;
    $activo=false;
    if(App\Banco::where('usuario_id',$idUser)->count()==0){
        $activo=true;
    }
    return [
        'usuario_id'=> $idUser,
        'numero_banco'=>$faker->bankAccountNumber,
        'titular'=>$faker->name,
        'activo'=>$activo,
    ];
});
