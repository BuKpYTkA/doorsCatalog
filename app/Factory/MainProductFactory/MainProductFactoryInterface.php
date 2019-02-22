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
     * @param string|null $brand
     * @param string|null $description
     * @param string|null $type
     * @param bool|null $isActive
     * @return MainProductInterface
     */
    public function create(string $title = null, int $price = null, string $brand = null, string $description = null, string $type = null, bool $isActive = null);
}