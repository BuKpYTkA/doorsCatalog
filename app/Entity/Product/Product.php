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
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return int
     */
    public function getPrice(): int
    {
        return $this->price;
    }

    /**
     * @param int $price
     */
    public function setPrice(int $price): void
    {
        $this->price = $price;
    }

}