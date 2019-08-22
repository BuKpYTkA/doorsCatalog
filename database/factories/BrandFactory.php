<?php

use Faker\Generator as Faker;

$factory->define(\App\Entity\Brand\Brand::class, function (Faker $faker) {
    return [
        'title' => $faker->text(6)
    ];
});
