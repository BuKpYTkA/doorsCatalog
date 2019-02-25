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
     * @return ProductInterface[]
     */
    public function findActive(int $paginator = null)
    {
        if ($paginator) {
            return $this->product->where(['is_active' => 1])->paginate($paginator);
        }
        return $this->product->where(['is_active' => 1])->get()->all();
    }

}