<?php
/**
 * Created by PhpStorm.
 * User: Suhich
 * Date: 10.02.2019
 * Time: 16:04
 */

namespace App\Repository\MainProductRepository;


use App\Entity\GeneralMapper\GeneralMapper;
use App\Entity\GeneralMapper\GeneralMapperInterface;
use App\Entity\Image\Image;
use App\Entity\MainProduct\MainProduct;
use App\Entity\MainProduct\MainProductInterface;
use App\Repository\ProductRepository\ProductRepository;

class MainProductRepository extends ProductRepository implements MainProductRepositoryInterface
{
    /**
     * @param int $id
     * @return MainProductInterface
     */
    public function find(int $id)
    {
        return MainProduct::find($id);
    }

    public function findImages(MainProductInterface $mainProduct)
    {
        return $mainProduct->hasMany(Image::class)->get()->all();
    }

}