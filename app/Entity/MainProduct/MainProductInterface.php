<?php
/**
 * Created by PhpStorm.
 * User: Suhich
 * Date: 09.02.2019
 * Time: 23:00
 */

namespace App\Entity\MainProduct;

use App\Entity\Image\ImageInterface;
use App\Entity\Product\ProductInterface;

interface MainProductInterface extends ProductInterface
{

    /**
     * @return string
     */
    public function getDescription();

    /**
     * @return string
     */
    public function getBrand();


    /**
     * @param string $description
     * @return void
     */
    public function setDescription(string $description);

    /**
     * @param string $brand
     * @return void
     */
    public function setBrand(string $brand);

}