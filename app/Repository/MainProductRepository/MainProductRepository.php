<?php
/**
 * Created by PhpStorm.
 * User: Suhich
 * Date: 10.02.2019
 * Time: 16:04
 */

namespace App\Repository\MainProductRepository;

use App\Entity\Brand\Brand;
use App\Entity\Brand\BrandInterface;
use App\Entity\Image\Image;
use App\Entity\Image\ImageInterface;
use App\Entity\MainProduct\MainProduct;
use App\Entity\MainProduct\MainProductInterface;
use App\Entity\ProductTypes\MainProductType;
use App\Repository\ProductRepository\ProductRepository;
use Illuminate\Database\Eloquent\Collection;
use PhpParser\Builder;

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
     * @return Collection ImageInterface
     */
    public function findImages(MainProductInterface $mainProduct)
    {
        return $mainProduct->hasMany(Image::class)->get();
    }

    /**
     * @param MainProductInterface $mainProduct
     * @return Collection MainProductType
     */
    public function findType(MainProductInterface $mainProduct)
    {
        return $mainProduct->belongsTo(MainProductType::class, 'type_id')->get();
    }

    /**
     * @param MainProductType $mainProductType
     * @return Collection MainProductInterface
     */
    public function findByType(MainProductType $mainProductType)
    {
        return $mainProductType->hasMany($this->mainProduct, 'type_id')->get();
    }

    /**
     * @param BrandInterface $brand
     * @param int|null $paginator
     * @return Collection MainProductInterface
     */
    public function findByBrand(BrandInterface $brand, int $paginator = null)
    {
        $builder = $brand->hasMany($this->mainProduct);
        if ($paginator) {
            return $builder->paginate($paginator);
        }
        return $builder->get();
    }

    /**
     * @param int $to
     * @param int $from
     * @param int|null $paginator
     * @return Collection MainProductInterface|LengthAwarePaginator
     */
    public function findByExactPrice(int $to, int $from = 0, int $paginator = null)
    {
        $builder = $this->mainProduct->where([['price', '>=', $from],['price', '<=', $to]]);
        if ($paginator) {
            return $builder->paginate($paginator);
        }
        return $builder->get();
    }

    /**
     * @param BrandInterface[] $brands
     * @return Builder MainProductInterface
     */
    public function filterByBrands(array $brands)
    {
        $brandIds = [];
        foreach ($brands as $brand) {
            $brandIds[] = $brand->getId();
        }
        return $this->mainProduct->whereIn('brand_id', $brandIds);
    }

    /**
     * @param MainProductType[] $types
     * @return Builder MainProductInterface
     */
    public function filterByTypes(array $types)
    {
        $typesIds = [];
        foreach ($types as $type) {
            $typesIds[] = $type->getId();
        }
        return $this->mainProduct->whereIn('type_id', $typesIds);
    }

}