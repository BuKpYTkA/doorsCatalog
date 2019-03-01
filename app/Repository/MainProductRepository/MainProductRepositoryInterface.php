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
use App\Entity\MainProduct\MainProductInterface;
use App\Entity\ProductTypes\MainProductType;
use App\Repository\ProductRepository\ProductRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use PhpParser\Builder;

interface MainProductRepositoryInterface extends ProductRepositoryInterface
{

    /**
     * @param MainProductInterface $mainProduct
     * @return Collection ImageInterface
     */
    public function findImages(MainProductInterface $mainProduct);

    /**
     * @param MainProductInterface $mainProduct
     * @return Collection MainProductType
     */
    public function findType(MainProductInterface $mainProduct);

    /**
     * @param MainProductType $mainProductType
     * @return Collection MainProductInterface
     */
    public function findByType(MainProductType $mainProductType);

    /**
     * @param BrandInterface $brand
     * @param int|null $paginator
     * @return Collection MainProductInterface
     */
    public function findByBrand(BrandInterface $brand, int $paginator = null);

    /**
     * @param int $to
     * @param int $from
     * @param int|null $paginator
     * @return Collection MainProductInterface|LengthAwarePaginator
     */
    public function findByExactPrice(int $to, int $from = 0, int $paginator = null);

    /**
     * @param BrandInterface[] $brands
     * @return Builder MainProductInterface
     */
    public function filterByBrands(array $brands);

    /**
     * @param MainProductType[] $types
     * @return Builder MainProductInterface
     */
    public function filterByTypes(array $types);

}