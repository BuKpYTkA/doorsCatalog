<?php
/**
 * Created by PhpStorm.
 * User: Suhich
 * Date: 10.02.2019
 * Time: 15:16
 */

namespace App\Factory\ProductFactory;


use App\Entity\Product\ProductInterface;

interface ProductFactoryInterface
{
    /**
     * @param array $fields
     * @return ProductInterface
     */
    public function create(array $fields);

}