<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\App\Entity\MainProduct\MainProduct::class, function (Faker $faker) {
    return [
        'title' => $faker->text(20),
        'price' => $faker->numberBetween(50, 2000),
        'brand_id' => $faker->numberBetween(1, 10),
        'type_id' => $faker->numberBetween(1, 3),
        'description' => $faker->text(200),
        'is_active' => $faker->numberBetween(0, 1)
    ];
});
