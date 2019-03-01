<?php
/**
 * Created by PhpStorm.
 * User: Suhich
 * Date: 10.02.2019
 * Time: 16:23
 */

namespace App\Repository\AdditionalProductRepository;

use App\Entity\AdditionalProduct\AdditionalProductInterface;
use App\Entity\ProductTypes\AdditionalProductType;
use App\Repository\ProductRepository\ProductRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

interface AdditionalProductRepositoryInterface extends ProductRepositoryInterface
{

    /**
     * @param AdditionalProductInterface $additionalProduct
     * @return AdditionalProductType
     */
    public function findType(AdditionalProductInterface $additionalProduct);

    /**
     * @param AdditionalProductType $additionalProductType
     * @return Collection AdditionalProductInterface
     */
    public function findByType(AdditionalProductType $additionalProductType);

}