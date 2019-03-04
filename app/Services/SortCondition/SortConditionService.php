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
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

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
    private $queryBuilder;

    /**
     * SortConditionService constructor.
     * @param MainProductRepositoryInterface $mainProductRepository
     */
    public function __construct(MainProductRepositoryInterface $mainProductRepository)
    {
        $this->mainProductRepository = $mainProductRepository;
        $this->queryBuilder = $this->mainProductRepository->queryBuilder();
    }

    /**
     * @param Model $queryBuilder
     * @param Request $request
     * @param array $appends
     * @return LengthAwarePaginator
     */
    public function sort(Model $queryBuilder, Request $request, array $appends = null)
    {
        $this->setPagination($request);
        if (!$queryBuilder) {
            $queryBuilder = $this->queryBuilder;
        }
        $sortMethod = $request->input(self::SORT);
        if ($sortMethod) {
            switch ($sortMethod) {
                case self::CHEAP:
                    $queryBuilder = $queryBuilder->orderBy('price');
                    break;
                case self::EXPENSIVE:
                    $queryBuilder = $queryBuilder->orderBy('price', 'desc');
                    break;
                default:
                    $queryBuilder = $queryBuilder->orderBy('price');
            }
        }
        $paginatedList = $queryBuilder->paginate($this->paginator);
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