<?php

use Illuminate\Database\Seeder;

class CobrosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            factory(App\Cobro::class, 30)->create();

    }
}
