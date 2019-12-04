<?php


use Illuminate\Database\Seeder;

class UsuariosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        App\Usuario::create(['nombre'=>'Oscar','apellido1'=>'Fernandez','apellido2'=>'Rodriguez','tipo_usuario_id'=>1,'imagen_usuario_id'=>1,'password_usuario_id'=>1]);
        Schema::enableForeignKeyConstraints();
        for($i=0;$i<50;$i++){
        factory(App\Usuario::class, 1)->create();
        }
    }
}
