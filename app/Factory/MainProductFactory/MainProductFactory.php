<?php
/**
 * Created by PhpStorm.
 * User: Suhich
 * Date: 10.02.2019
 * Time: 15:24
 */

namespace App\Factory\MainProductFactory;


use App\Entity\MainProduct\MainProduct;
use App\Factory\ProductFactory\ProductFactory;

class MainProductFactory extends ProductFactory implements MainProductFactoryInterface
{
    /**
     * @param array $fields
     * @return MainProduct|mixed
     */
    public function create(array $fields)
    {
        return new MainProduct([
            'title' => $fields['title'],
            'price' => $fields['price'],
            'brand' => $fields['brand'],
            'description' => $fields['description']
        ]);
    }

}