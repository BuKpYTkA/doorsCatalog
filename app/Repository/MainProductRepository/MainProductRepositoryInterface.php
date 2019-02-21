<?php
/**
 * Created by PhpStorm.
 * User: Suhich
 * Date: 10.02.2019
 * Time: 16:04
 */

namespace App\Repository\MainProductRepository;


use App\Entity\MainProduct\MainProduct;
use App\Entity\MainProduct\MainProductInterface;
use App\Repository\ProductRepository\ProductRepositoryInterface;

interface MainProductRepositoryInterface extends ProductRepositoryInterface
{
    public function findImages(MainProductInterface $mainProduct);

    /**
     * @param int $id
     * @return MainProductInterface
     */
    public function find(int $id);

    /**
     * @param int $paginator|null
     * @return MainProduct[]|\Illuminate\Database\Eloquent\Collection
     */
    public function findAll(int $paginator = null);

    /**
     * @param $id
     * @return MainProductInterface|404
     */
    public function findOrFail($id);
}