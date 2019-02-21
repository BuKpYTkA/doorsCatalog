<?php
/**
 * Created by PhpStorm.
 * User: Suhich
 * Date: 10.02.2019
 * Time: 15:48
 */

namespace App\Factory\AdditionalProductFactory;


use App\Entity\AdditionalProduct\AdditionalProduct;
use App\Entity\Product\ProductInterface;
use App\Factory\ProductFactory\ProductFactory;

class AdditionalProductFactory extends ProductFactory implements AdditionalProductFactoryInterface
{
    /**
     * @param array $fields
     * @return AdditionalProduct|ProductInterface
     */
    public function create(array $fields)
    {
        return new AdditionalProduct([
            'title' => $fields['title'],
            'price' => $fields['price'],
        ]);
    }

}