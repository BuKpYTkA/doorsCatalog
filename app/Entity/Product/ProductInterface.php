<?php
/**
 * Created by PhpStorm.
 * User: Suhich
 * Date: 10.02.2019
 * Time: 12:12
 */

namespace App\Entity\Product;

interface ProductInterface
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

    /**
     * @return bool
     */
    public function isActive();

    /**
     * @param bool $isActive
     */
    public function setIsActive(bool $isActive);

    /**
     * @return int
     */
    public function getTypeId();

    /**
     * @param int $type_id
     */
    public function setTypeId(int $type_id);

    /**
     * @return int
     */
    public function getId(): int;

}