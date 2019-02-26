<?php
/**
 * Created by PhpStorm.
 * User: Suhich
 * Date: 10.02.2019
 * Time: 15:59
 */

namespace App\Repository\ProductRepository;

use App\Entity\Product\ProductInterface;
use App\Repository\GeneralRepository\GeneralRepositoryInterface;

interface ProductRepositoryInterface extends GeneralRepositoryInterface
{

    /**
     * @param int|null $paginator
     * @return ProductInterface[]
     */
    public function findActive(int $paginator = null);

    /**
     * @param int|null $paginator
     * @return ProductInterface[]
     */
    public function sortByPriceUp(int $paginator = null);

    /**
     * @param int|null $paginator
     * @return ProductInterface[]
     */
    public function sortByPriceDown(int $paginator = null);

    /**
     * @param int|null $paginator
     * @return ProductInterface[]
     */
    public function sortByType(int $paginator = null);

}