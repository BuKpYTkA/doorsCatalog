<?php
/**
 * Created by PhpStorm.
 * User: Suhich
 * Date: 10.02.2019
 * Time: 15:15
 */

namespace App\Factory\MainProductFactory;

use App\Entity\MainProduct\MainProductInterface;
use App\Factory\ProductFactory\ProductFactoryInterface;

interface MainProductFactoryInterface extends ProductFactoryInterface
{

    /**
     * @param string|null $title
     * @param int|null $price
     * @param int|null $brandId
     * @param string|null $description
     * @param int $type
     * @param bool|null $isActive
     * @return MainProductInterface
     */
    public function create(string $title = null, int $price = null, int $brandId = null, string $description = null, int $type = null, bool $isActive = null);

}