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
use App\Entity\ProductTypes\AdditionalProductType;
use App\Repository\ProductRepository\ProductRepository;
use Illuminate\Database\Eloquent\Collection;

class AdditionalProductRepository extends ProductRepository implements AdditionalProductRepositoryInterface
{

    /**
     * @var AdditionalProductInterface
     */
    private $additionalProduct;

    /**
     * AdditionalProductRepository constructor.
     * @param AdditionalProduct $additionalProduct
     */
    public function __construct(AdditionalProduct $additionalProduct)
    {
        parent::__construct($additionalProduct);
        $this->additionalProduct = $additionalProduct;
    }

    /**
     * @param AdditionalProductInterface $additionalProduct
     * @return AdditionalProductType
     */
    public function findType(AdditionalProductInterface $additionalProduct)
    {
        return $additionalProduct->belongsTo(AdditionalProductType::class, 'type_id')->get()->first();
    }

    /**
     * @param AdditionalProductType $additionalProductType
     * @return Collection AdditionalProductInterface
     */
    public function findByType(AdditionalProductType $additionalProductType)
    {
        return $additionalProductType->hasMany($this->additionalProduct, 'type_id')->get();
    }

}