<?php
/**
 * Created by PhpStorm.
 * User: Suhich
 * Date: 10.02.2019
 * Time: 15:24
 */

namespace App\Factory\MainProductFactory;

use App\Entity\MainProduct\MainProduct;
use App\Entity\MainProduct\MainProductInterface;
use App\Factory\ProductFactory\ProductFactory;

class MainProductFactory extends ProductFactory implements MainProductFactoryInterface
{

    /**
     * @param string|null $title
     * @param int|null $price
     * @param int|null $brandId
     * @param string|null $description
     * @param int|null $type
     * @param bool|null $isActive
     * @return MainProductInterface
     */
    public function create(string $title = null, int $price = null, int $brandId = null, string $description = null, int $type = null, bool $isActive = null)
    {
        return new MainProduct([
            'title' => $title,
            'price' => $price,
            'brand_id' => $brandId,
            'description' => $description,
            'type_id' => $type,
            'is_active' => $isActive,
        ]);
    }

}