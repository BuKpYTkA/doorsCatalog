<?php
/**
 * Created by PhpStorm.
 * User: Suhich
 * Date: 10.02.2019
 * Time: 16:02
 */

namespace App\Repository\ProductRepository;

use App\Entity\Product\Product;
use App\Entity\Product\ProductInterface;
use App\Repository\GeneralRepository\GeneralRepository;
use Illuminate\Database\Eloquent\Collection;

class ProductRepository extends GeneralRepository implements ProductRepositoryInterface
{

    /**
     * @var ProductInterface
     */
    private $product;

    /**
     * ProductRepository constructor.
     * @param Product $product
     */
    public function __construct(Product $product)
    {
        parent::__construct($product);
        $this->product = $product;
    }

    /**
     * @param int|null $paginator
     * @return Collection ProductInterface|LengthAwarePaginator
     */
    public function findActive(int $paginator = null)
    {
        $builder = $this->product->where(['is_active' => 1]);
        if ($paginator) {
            return $builder->paginate($paginator);
        }
        return $builder->get();
    }

    /**
     * @param int|null $paginator
     * @return Collection ProductInterface|LengthAwarePaginator
     */
    public function sortByPriceUp(int $paginator = null)
    {
        $builder = $this->product->orderBy('price');
        if ($paginator) {
            return $builder->paginate($paginator);
        }
        return $builder->get();
    }

    /**
     * @param int|null $paginator
     * @return Collection ProductInterface|LengthAwarePaginator
     */
    public function sortByPriceDown(int $paginator = null)
    {
        $builder = $this->product->orderBy('price', 'desc');
        if ($paginator) {
            return $builder->paginate($paginator);
        }
        return $builder->get();
    }

    /**
     * @param int|null $paginator
     * @return Collection ProductInterface|LengthAwarePaginator
     */
    public function sortByType(int $paginator = null)
    {
        $builder = $this->product->orderBy('type_id');
        if ($paginator) {
            return $builder->paginate($paginator);
        }
        return $builder->get();
    }

}