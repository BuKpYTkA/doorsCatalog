<?php
/**
 * Created by PhpStorm.
 * User: a.neposedov
 * Date: 27.03.2019
 * Time: 11:37
 */

namespace App\Repository\MainProductRepository;


use App\Entity\Brand\BrandInterface;
use App\Entity\MainProduct\MainProduct;
use App\Entity\MainProduct\MainProductInterface;
use App\Entity\ProductTypes\MainProductType;
use App\Repository\ProductRepository\ProductRepository;
use Illuminate\Cache\Repository;
use phpDocumentor\Reflection\Types\Static_;

class CachedMainProductRepository extends ProductRepository implements MainProductRepositoryInterface
{

    const CACHE_TIME = 10;

    /**
     * @var MainProductInterface
     */
    private $mainProduct;

    /**
     * @var MainProductRepositoryInterface
     */
    private $mainProductRepository;

    /**
     * @var Repository
     */
    private $cache;

    /**
     * CachedMainProductRepository constructor.
     * @param MainProduct $mainProduct
     * @param MainProductRepositoryInterface $mainProductRepository
     * @param Repository $cache
     */
    public function __construct(MainProduct $mainProduct, MainProductRepositoryInterface $mainProductRepository, Repository $cache)
    {
        parent::__construct($mainProduct);
        $this->mainProduct = $mainProduct;
        $this->mainProductRepository = $mainProductRepository;
        $this->cache = $cache;
    }

    public function findImages(MainProductInterface $mainProduct)
    {
//        \Cache::remember('mainProductImages', static::CACHE_TIME,
//            function () use ($mainProduct) {
//                $this->mainProductRepository->findImages($mainProduct);
//            });
        return $this->cache->remember('mainProductImages', static::CACHE_TIME,
            function () use ($mainProduct) {
                return $this->mainProductRepository->findImages($mainProduct);
            });
    }

    public function findType(MainProductInterface $mainProduct)
    {
        // TODO: Implement findType() method.
    }

    public function findByType(MainProductType $mainProductType)
    {
        // TODO: Implement findByType() method.
    }

    public function findByBrand(BrandInterface $brand, int $paginator = null)
    {
        // TODO: Implement findByBrand() method.
    }

    public function findByExactPrice(int $to, int $from = 0, int $paginator = null)
    {
        // TODO: Implement findByExactPrice() method.
    }

    public function filterByBrands(array $brands)
    {
        // TODO: Implement filterByBrands() method.
    }

    public function filterByTypes(array $types)
    {
        // TODO: Implement filterByTypes() method.
    }

    public function withRelations()
    {
        // TODO: Implement withRelations() method.
    }

}