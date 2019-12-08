<?php

use Illuminate\Database\Seeder;

class TiposUsuarioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        App\Tipo_Usuario::create(['usuario_id'=>1,'descripcion'=>'Administrador']);
        App\Tipo_Usuario::create(['usuario_id'=>1,'descripcion'=>'Gerente']);
        App\Tipo_Usuario::create(['usuario_id'=>1,'descripcion'=>'Administrativo']);
        App\Tipo_Usuario::create(['usuario_id'=>1,'descripcion'=>'Almacenista']);
        App\Tipo_Usuario::create(['usuario_id'=>1,'descripcion'=>'Usuario']);
        Schema::enableForeignKeyConstraints();
    }
}
