<?php
/**
 * Created by PhpStorm.
 * User: Suhich
 * Date: 10.02.2019
 * Time: 16:04
 */

namespace App\Repository\MainProductRepository;

use App\Entity\Brand\BrandInterface;
use App\Entity\Image\Image;
use App\Entity\Image\ImageInterface;
use App\Entity\MainProduct\MainProduct;
use App\Entity\MainProduct\MainProductInterface;
use App\Entity\ProductTypes\MainProductType;
use App\Repository\ProductRepository\ProductRepository;

class MainProductRepository extends ProductRepository implements MainProductRepositoryInterface
{

    /**
     * @var MainProductInterface
     */
    private $mainProduct;

    /**
     * MainProductRepository constructor.
     * @param MainProduct $mainProduct
     */
    public function __construct(MainProduct $mainProduct)
    {
        parent::__construct($mainProduct);
        $this->mainProduct = $mainProduct;
    }

    /**
     * @param MainProductInterface $mainProduct
     * @return ImageInterface[]
     */
    public function findImages(MainProductInterface $mainProduct)
    {
        return $mainProduct->hasMany(Image::class)->get()->all();
    }

    /**
     * @param MainProductInterface $mainProduct
     * @return MainProductType
     */
    public function findType(MainProductInterface $mainProduct)
    {
        return $mainProduct->belongsTo(MainProductType::class, 'type_id')->get()->all();
    }

    /**
     * @param MainProductType $mainProductType
     * @return MainProductInterface[]|null
     */
    public function findByType(MainProductType $mainProductType)
    {
        if (!$mainProductType) {
            return null;
        }
        return $mainProductType->hasMany($this->mainProduct, 'type_id')->get()->all();
    }

    /**
     * @param BrandInterface $brand
     * @return MainProduct[]|null
     */
    public function findByBrand(BrandInterface $brand)
    {
        if (!$brand->getId()) {
            return null;
        }
        return $brand->hasMany($this->mainProduct)->get()->all();
    }

}