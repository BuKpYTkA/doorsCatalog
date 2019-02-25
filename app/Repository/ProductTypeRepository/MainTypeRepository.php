<?php
/**
 * Created by PhpStorm.
 * User: a.neposedov
 * Date: 25.02.2019
 * Time: 11:12
 */

namespace App\Repository\ProductTypeRepository;

use App\Entity\ProductTypes\MainProductType;
use App\Repository\GeneralRepository\GeneralRepository;

class MainTypeRepository extends GeneralRepository
{

    /**
     * MainTypeRepository constructor.
     * @param MainProductType $mainProductType
     */
    public function __construct(MainProductType $mainProductType)
    {
        parent::__construct($mainProductType);
    }

}