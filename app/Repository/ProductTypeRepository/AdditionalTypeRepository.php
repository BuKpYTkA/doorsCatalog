<?php
/**
 * Created by PhpStorm.
 * User: a.neposedov
 * Date: 25.02.2019
 * Time: 11:14
 */

namespace App\Repository\ProductTypeRepository;

use App\Entity\ProductTypes\AdditionalProductType;
use App\Repository\GeneralRepository\GeneralRepository;

class AdditionalTypeRepository extends GeneralRepository
{

    /**
     * AdditionalTypeRepository constructor.
     * @param AdditionalProductType $additionalProductType
     */
    public function __construct(AdditionalProductType $additionalProductType)
    {
        parent::__construct($additionalProductType);
    }

}