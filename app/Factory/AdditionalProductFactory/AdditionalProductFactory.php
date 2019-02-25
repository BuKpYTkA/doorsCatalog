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
     * @param string|null $title
     * @param int|null $price
     * @param int|null $type
     * @param bool|null $isActive
     * @return AdditionalProduct|ProductInterface
     */
    public function create(string $title = null, int $price = null, int $type = null, bool $isActive = null)
    {
        return new AdditionalProduct([
            'title' => $title,
            'price' => $price,
            'type_id' => $type,
            'is_active' => $isActive
        ]);
    }

}