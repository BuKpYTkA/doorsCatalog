<?php
/**
 * Created by PhpStorm.
 * User: Suhich
 * Date: 10.02.2019
 * Time: 16:04
 */

namespace App\Repository\MainProductRepository;

use App\Entity\Brand\BrandInterface;
use App\Entity\Image\ImageInterface;
use App\Entity\MainProduct\MainProduct;
use App\Entity\MainProduct\MainProductInterface;
use App\Entity\ProductTypes\MainProductType;
use App\Repository\ProductRepository\ProductRepositoryInterface;

interface MainProductRepositoryInterface extends ProductRepositoryInterface
{

    /**
     * @param int $id
     * @return MainProduct
     */
    public function find(int $id);

    /**
     * @param MainProductInterface $mainProduct
     * @return ImageInterface[]
     */
    public function findImages(MainProductInterface $mainProduct);

    /**
     * @param MainProductInterface $mainProduct
     * @return MainProductType
     */
    public function findType(MainProductInterface $mainProduct);

    /**
     * @param BrandInterface $brand
     * @return MainProduct[]|null
     */
    public function findByBrand(BrandInterface $brand);

    /**
     * @param MainProductType $mainProductType
     * @return MainProductInterface[]|null
     */
    public function findByType(MainProductType $mainProductType);

}