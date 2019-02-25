<?php
/**
 * Created by PhpStorm.
 * User: Suhich
 * Date: 09.02.2019
 * Time: 23:00
 */

namespace App\Entity\MainProduct;

use App\Entity\Product\ProductInterface;

interface MainProductInterface extends ProductInterface
{

    /**
     * @return string
     */
    public function getDescription();

    /**
     * @return int
     */
    public function getBrandId();


    /**
     * @param string $description
     * @return void
     */
    public function setDescription(string $description);

    /**
     * @param int $brand
     * @return void
     */
    public function setBrandId(int $brand);

}