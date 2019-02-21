<?php
/**
 * Created by PhpStorm.
 * User: Suhich
 * Date: 10.02.2019
 * Time: 12:13
 */

namespace App\Entity\Product;


use App\Entity\GeneralMapper\GeneralMapper;

/**
 * Class Product
 * @package App\Entity\Product
 * @property string $title
 * @property int $price
 */
abstract class Product extends GeneralMapper implements ProductInterface
{

    /**
     * @return string|null
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return void
     */
    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    /**
     * @return int|null
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param int $price
     * @return void
     */
    public function setPrice(int $price)
    {
        $this->price = $price;
    }

}