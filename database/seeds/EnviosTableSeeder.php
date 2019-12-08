<?php

use Illuminate\Database\Seeder;

class EnviosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Envio::class, 30)->create();
    }
}
