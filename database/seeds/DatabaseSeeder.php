<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call(EstadoCobroTableSeeder::class);
        $this->call(EstadoEnvioTableSeeder::class);
        $this->call(EstadoPedidoTableSeeder::class);
        $this->call(SeccionesTableSeeder::class);
        $this->call(SubseccionesTableSeeder::class);
        $this->call(TiposUsuarioTableSeeder::class);
        $this->call(UsuariosTableSeeder::class);
        $this->call(ArticulosTableSeeder::class);
        $this->call(ComentariosTableSeeder::class);
        $this->call(WishlistsTableSeeder::class);

    }
}
