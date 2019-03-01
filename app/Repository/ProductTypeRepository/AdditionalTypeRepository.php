<?php
/**
 * Created by PhpStorm.
 * User: a.neposedov
 * Date: 25.02.2019
 * Time: 11:14
 */

namespace App\Repository\ProductTypeRepository;

use App\Entity\AdditionalProduct\AdditionalProduct;
use App\Entity\AdditionalProduct\AdditionalProductInterface;
use App\Entity\ProductTypes\AdditionalProductType;
use App\Repository\GeneralRepository\GeneralRepository;

class AdditionalTypeRepository extends GeneralRepository
{

    /**
     * @var AdditionalProductType
     */
    private $additionalProductType;

    /**
     * AdditionalTypeRepository constructor.
     * @param AdditionalProductType $additionalProductType
     */
    public function __construct(AdditionalProductType $additionalProductType)
    {
        parent::__construct($additionalProductType);
        $this->additionalProductType = $additionalProductType;
    }

    /**
     * @param $additionalProductType AdditionalProductInterface
     * @return AdditionalProduct[]
     */
    public function findProducts($additionalProductType)
    {
        return $additionalProductType->hasMany(AdditionalProduct::class, 'type_id')->get();
    }

}