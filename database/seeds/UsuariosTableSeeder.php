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
        App\Usuario::create(['email'=>'kokeferrol@yahoo.com','password'=>bcrypt('secret'),'remember_token'=>Str::random(),'nombre'=>'Oscar','apellido1'=>'Fernandez','apellido2'=>'Rodriguez','tipo_usuario_id'=>1]);
        Schema::enableForeignKeyConstraints();
        for($i=0;$i<250;$i++){
        factory(App\Usuario::class, 1)->create();
        }
    }
}
