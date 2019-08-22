<?php

use Faker\Generator as Faker;

$factory->define(\App\Entity\ProductTypes\MainProductType::class, function (Faker $faker) {
    return [
        'single' => $faker->text(10),
        'multiple' => $faker->text(8),
    ];
});
