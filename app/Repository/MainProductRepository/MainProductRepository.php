<?php
/**
 * Created by PhpStorm.
 * User: Suhich
 * Date: 10.02.2019
 * Time: 16:04
 */

namespace App\Repository\MainProductRepository;

use App\Entity\Image\Image;
use App\Entity\Image\ImageInterface;
use App\Entity\MainProduct\MainProduct;
use App\Entity\MainProduct\MainProductInterface;
use App\Repository\ProductRepository\ProductRepository;

class MainProductRepository extends ProductRepository implements MainProductRepositoryInterface
{
    /**
     * MainProductRepository constructor.
     * @param MainProduct $mainProduct
     */
    public function __construct(MainProduct $mainProduct)
    {
        parent::__construct($mainProduct);
    }

    /**
     * @param MainProductInterface $mainProduct
     * @return ImageInterface[]
     */
    public function findImages(MainProductInterface $mainProduct)
    {
        return $mainProduct->hasMany(Image::class)->get()->all();
    }

}