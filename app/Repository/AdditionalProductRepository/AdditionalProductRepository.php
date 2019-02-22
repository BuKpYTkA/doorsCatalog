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
use Illuminate\Database\Eloquent\Model;

class AdditionalProductRepository extends ProductRepository implements AdditionalProductRepositoryInterface
{

    /**
     * AdditionalProductRepository constructor.
     * @param AdditionalProduct $additionalProduct
     */
    public function __construct(AdditionalProduct $additionalProduct)
    {
        parent::__construct($additionalProduct);
    }

}