<?php
/**
 * Created by PhpStorm.
 * User: a.neposedov
 * Date: 25.02.2019
 * Time: 13:08
 */

namespace App\Repository\BrandRepository;

use App\Entity\Brand\Brand;
use App\Entity\Brand\BrandInterface;
use App\Entity\MainProduct\MainProduct;
use App\Repository\GeneralRepository\GeneralRepository;

class BrandRepository extends GeneralRepository implements BrandRepositoryInterface
{

    /**
     * @var Brand
     */
    private $brand;

    /**
     * BrandRepository constructor.
     * @param Brand $brand
     */
    public function __construct(Brand $brand)
    {
        parent::__construct($brand);
        $this->brand = $brand;
    }

    /**
     * @return BrandInterface[]
     */
    public function findWithProducts()
    {
        $brandsWithProduct = [];
        $brands = $this->findAll();
        foreach ($brands as $brand) {
            $products = $brand->hasMany(MainProduct::class)->get();
            if ($products) {
                $brandsWithProduct[] = $brand;
            }
        }
        return $brandsWithProduct;
    }

}