<?php
/**
 * Created by PhpStorm.
 * User: a.neposedov
 * Date: 25.02.2019
 * Time: 13:36
 */

namespace App\Repository\BrandRepository;

use App\Entity\Brand\BrandInterface;
use App\Repository\GeneralRepository\GeneralRepositoryInterface;

interface BrandRepositoryInterface extends GeneralRepositoryInterface
{
    /**
     * @return BrandInterface[]
     */
    public function findWithProducts();

}