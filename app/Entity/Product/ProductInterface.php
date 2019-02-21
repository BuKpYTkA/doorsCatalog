<?php
/**
 * Created by PhpStorm.
 * User: Suhich
 * Date: 10.02.2019
 * Time: 12:12
 */

namespace App\Entity\Product;

use App\Entity\GeneralMapper\GeneralMapperInterface;

interface ProductInterface extends GeneralMapperInterface
{

    /**
     * @return string
     */
    public function getTitle();

    /**
     * @return int
     */
    public function getPrice();

    /**
     * @param string $title
     * @return mixed
     */
    public function setTitle(string $title);

    /**
     * @param int $price
     * @return mixed
     */
    public function setPrice(int $price);
}