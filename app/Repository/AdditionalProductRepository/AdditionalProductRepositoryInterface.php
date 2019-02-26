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

interface AdditionalProductRepositoryInterface extends ProductRepositoryInterface
{

    /**
     * @param AdditionalProductInterface $additionalProduct
     * @return AdditionalProductType
     */
    public function findType(AdditionalProductInterface $additionalProduct);

    /**
     * @param AdditionalProductType $additionalProductType
     * @return AdditionalProductInterface[]|null
     */
    public function findByType(AdditionalProductType $additionalProductType);

}