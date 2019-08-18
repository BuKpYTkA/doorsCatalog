<?php

use Illuminate\Database\Seeder;

class MainProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Entity\MainProduct\MainProduct::class, 50)->create();
    }
}
