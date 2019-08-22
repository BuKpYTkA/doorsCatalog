<?php

use Illuminate\Database\Seeder;

class MainProductTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Entity\ProductTypes\MainProductType::class, 3)->create();
    }
}
