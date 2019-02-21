<?php
/**
 * Created by PhpStorm.
 * User: Suhich
 * Date: 10.02.2019
 * Time: 16:04
 */

namespace App\Repository\MainProductRepository;


use App\Entity\MainProduct\MainProductInterface;
use App\Repository\ProductRepository\ProductRepositoryInterface;

interface MainProductRepositoryInterface extends ProductRepositoryInterface
{
    public function findImages(MainProductInterface $mainProduct);
}