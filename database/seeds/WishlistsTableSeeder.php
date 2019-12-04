<?php

use Illuminate\Database\Seeder;

class WishlistsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Wishlist::class, 600)->create();
    }
}
