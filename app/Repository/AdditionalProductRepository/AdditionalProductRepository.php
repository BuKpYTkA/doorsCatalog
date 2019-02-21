<?php
/**
 * Created by PhpStorm.
 * User: Suhich
 * Date: 10.02.2019
 * Time: 16:23
 */

namespace App\Repository\AdditionalProductRepository;


use App\Entity\AdditionalProduct\AdditionalProduct;
use App\Entity\AdditionalProduct\AdditionalProductInterface;
use App\Repository\ProductRepository\ProductRepository;

class AdditionalProductRepository extends ProductRepository implements AdditionalProductRepositoryInterface
{
    /**
     * @param int $id
     * @return AdditionalProductInterface
     */
    public function find(int $id)
    {
        return AdditionalProduct::find($id);
    }
}