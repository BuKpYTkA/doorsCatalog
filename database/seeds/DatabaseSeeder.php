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
        $this->call(MainProductsTableSeeder::class);
        $this->call(MainProductTypesTableSeeder::class);
        $this->call(BrandsTableSeeder::class);
    }
}
