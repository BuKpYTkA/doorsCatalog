<?php
/**
 * Created by PhpStorm.
 * User: Suhich
 * Date: 10.02.2019
 * Time: 15:59
 */

namespace App\Repository\ProductRepository;

use App\Repository\GeneralRepository\GeneralRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

interface ProductRepositoryInterface extends GeneralRepositoryInterface
{

    /**
     * @param int|null $paginator
     * @return Collection ProductInterface|LengthAwarePaginator
     */
    public function findActive(int $paginator = null);

    /**
     * @param int|null $paginator
     * @return Collection ProductInterface|LengthAwarePaginator
     */
    public function sortByPriceUp(int $paginator = null);

    /**
     * @param int|null $paginator
     * @return Collection ProductInterface|LengthAwarePaginator
     */
    public function sortByPriceDown(int $paginator = null);

    /**
     * @param int|null $paginator
     * @return Collection ProductInterface|LengthAwarePaginator
     */
    public function sortByType(int $paginator = null);
}