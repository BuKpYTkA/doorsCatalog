<?php
/**
 * Created by PhpStorm.
 * User: a.neposedov
 * Date: 01.03.2019
 * Time: 13:54
 */

namespace App\Services\FilterCondition;

use App\Repository\MainProductRepository\MainProductRepositoryInterface;
use App\Services\SortCondition\SortConditionServiceInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class FilterConditionService implements FilterConditionServiceInterface
{

    const PAGINATION_GETTER = 'per_page';
    const BRAND = 'brand';
    const TYPE = 'type';
    const MAX_PRICE = 'max_price';
    const MIN_PRICE = 'min_price';

    /**
     * @var MainProductRepositoryInterface
     */
    private $mainProductRepository;

    /**
     * @var SortConditionServiceInterface
     */
    private $sortConditionService;

    /**
     * @var array
     */
    private $appends;

    /**
     * @var Model
     */
    private $queryBuilder;

    /**
     * FilterConditionService constructor.
     * @param MainProductRepositoryInterface $mainProductRepository
     * @param SortConditionServiceInterface $sortConditionService
     */
    public function __construct(MainProductRepositoryInterface $mainProductRepository, SortConditionServiceInterface $sortConditionService)
    {
        $this->mainProductRepository = $mainProductRepository;
        $this->sortConditionService = $sortConditionService;
        $this->queryBuilder = $this->mainProductRepository->queryBuilder();
    }


    /**
     * @param Request $request
     * @return LengthAwarePaginator
     */
    public function filter(Request $request)
    {
        $queryBuilder = $this->getFiltered($request);
        return $this->sortConditionService->sort($queryBuilder, $request, $this->appends);
    }

    /**
     * @param Request $request
     * @return Model|null
     */
    private function getFiltered(Request $request)
    {
        if ($request->input()) {
            if ($request->has(self::BRAND)) {
                $params = explode(',', $request->get(self::BRAND));
                $this->queryBuilder = $this->queryBuilder->whereIn(self::BRAND . '_id', $params);
                $this->appends[self::BRAND] = $request->get(self::BRAND);
            }
            if ($request->has(self::TYPE)) {
                $params = explode(',', $request->get(self::TYPE));
                $this->queryBuilder = $this->queryBuilder->whereIn(self::TYPE . '_id', $params);
                $this->appends[self::TYPE] = $request->get(self::TYPE);
            }
            if ($request->has(self::MAX_PRICE)) {
                $param = $request->get(self::MAX_PRICE);
                $this->queryBuilder = $this->queryBuilder->where('price', '<=', $param);
                $this->appends[self::MAX_PRICE] = $request->get(self::MAX_PRICE);
            }
            if ($request->has(self::MIN_PRICE)) {
                $param = $request->get(self::MIN_PRICE);
                $this->queryBuilder = $this->queryBuilder->where('price', '>=', $param);
                $this->appends[self::MIN_PRICE] = $request->get(self::MIN_PRICE);
            }
            return $this->queryBuilder;
        }
        return null;
    }

}