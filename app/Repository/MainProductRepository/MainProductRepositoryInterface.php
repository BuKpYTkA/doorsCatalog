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
use Illuminate\Database\Eloquent\Model;

interface MainProductRepositoryInterface extends ProductRepositoryInterface
{

    /**
     * @param int $id
     * @return MainProduct
     */
    public function find(int $id);

    /**
     * @param MainProductInterface $mainProduct
     * @return mixed
     */
    public function findImages(MainProductInterface $mainProduct);

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