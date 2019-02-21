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
use Illuminate\Database\Eloquent\Model;

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