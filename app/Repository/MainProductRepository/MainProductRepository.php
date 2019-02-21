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
use http\Exception;

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

    /**
     * @param int $paginator|null
     * @return MainProduct[]|\Illuminate\Database\Eloquent\Collection
     */
    public function findAll(int $paginator = null)
    {
        if ($paginator) {
            return MainProduct::paginate($paginator);
        }
        return MainProduct::all();
    }

    /**
     * @param $id
     * @return MainProductInterface|404
     */
    public function findOrFail($id)
    {
        return MainProduct::findOrFail($id);
    }

    /**
     * @param MainProductInterface $mainProduct
     * @return Image[]
     */
    public function findImages(MainProductInterface $mainProduct)
    {
        return $mainProduct->hasMany(Image::class)->get()->all();
    }

}