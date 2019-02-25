<?php
/**
 * Created by PhpStorm.
 * User: Suhich
 * Date: 10.02.2019
 * Time: 15:47
 */

namespace App\Factory\AdditionalProductFactory;

use App\Entity\AdditionalProduct\AdditionalProduct;
use App\Entity\Product\ProductInterface;
use App\Factory\ProductFactory\ProductFactoryInterface;

interface AdditionalProductFactoryInterface extends ProductFactoryInterface
{

    /**
     * @param string|null $title
     * @param int|null $price
     * @param int $type
     * @param bool|null $isActive
     * @return AdditionalProduct|ProductInterface
     */
    public function create(string $title = null, int $price = null, int $type = null, bool $isActive = null);

}