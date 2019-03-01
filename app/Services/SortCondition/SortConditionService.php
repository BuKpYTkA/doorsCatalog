<?php
/**
 * Created by PhpStorm.
 * User: a.neposedov
 * Date: 27.02.2019
 * Time: 17:54
 */

namespace App\Services\SortCondition;

use App\Entity\MainProduct\MainProduct;
use App\Repository\MainProductRepository\MainProductRepositoryInterface;
use App\Services\PaginationValues\PaginationValues;
use Illuminate\Http\Request;

class SortConditionService implements SortConditionServiceInterface
{

    const PAGINATION = 'per_page';
    const SORT = 'sort';
    const CHEAP = 'cheap';
    const EXPENSIVE = 'expensive';

    /**
     * @var int
     */
    private $paginator;

    /**
     * @var MainProductRepositoryInterface
     */
    private $mainProductRepository;

    /**
     * @var MainProduct
     */
    private $mainProductModel;

    /**
     * SortConditionService constructor.
     * @param MainProductRepositoryInterface $mainProductRepository
     * @param MainProduct $mainProductModel
     */
    public function __construct(MainProductRepositoryInterface $mainProductRepository, MainProduct $mainProductModel)
    {
        $this->mainProductRepository = $mainProductRepository;
        $this->mainProductModel = $mainProductModel;
    }

    /**
     * @param $mainProducts
     * @param Request $request
     * @param array $appends
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function sort($mainProducts, Request $request, array $appends = null)
    {
        $this->setPagination($request);
        if (!$mainProducts) {
            $mainProducts = $this->mainProductModel;
        }
        $sortMethod = $request->get(self::SORT);
        if ($sortMethod) {
            switch ($sortMethod) {
                case self::CHEAP:
                    $sorted = $mainProducts->orderBy('price');
                    break;
                case self::EXPENSIVE:
                    $sorted = $mainProducts->orderBy('price', 'desc');
                    break;
                default:
                    $sorted = $mainProducts->orderBy('price');
            }
            $mainProducts = $sorted;
        }
        $paginatedList = $mainProducts->paginate($this->paginator);
        $paginatedList->appends(self::PAGINATION, $this->paginator);
        $paginatedList->appends(self::SORT, $sortMethod);
        if ($appends) {
            foreach ($appends as $key => $value) {
                $paginatedList->appends($key, $value);
            }
        }
        return $paginatedList;
    }

    /**
     * @param Request $request
     * @return void
     */
    private function setPagination(Request $request)
    {
        $paginator = (int)$request->get(self::PAGINATION);
        if ($paginator && in_array($paginator, PaginationValues::PAGINATION_VALUES)) {
            $this->paginator = $paginator;
        } else {
            $this->paginator = PaginationValues::DEFAULT;
        }
    }

}