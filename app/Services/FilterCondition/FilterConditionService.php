<?php
/**
 * Created by PhpStorm.
 * User: a.neposedov
 * Date: 01.03.2019
 * Time: 13:54
 */

namespace App\Services\FilterCondition;

use App\Repository\MainProductRepository\MainProductRepositoryInterface;
use App\Services\RelationsService\MainProductRelations;
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
    private $appends = [];

    /**
     * @var Model
     */
    private $queryBuilder;

    /**
     * FilterConditionService constructor.
     * @param MainProductRepositoryInterface $mainProductRepository
     */
    public function __construct(MainProductRepositoryInterface $mainProductRepository)
    {
        $this->mainProductRepository = $mainProductRepository;
        $this->queryBuilder = $this->mainProductRepository->queryBuilder();
    }


    /**
     * @param Request $request
     * @param bool|null $isActive
     * @return array
     */
    public function filter(Request $request, bool $isActive = null)
    {
        $queryBuilder = $this->getFiltered($request);
        if ($isActive) {
            $queryBuilder = $queryBuilder->active();
        }
        $queryBuilder = $queryBuilder->with(MainProductRelations::RELATIONS);
        return [
            'builder' => $queryBuilder,
            'appends' => $this->appends,
        ];
    }

    /**
     * @param Request $request
     * @return Model
     */
    private function getFiltered(Request $request)
    {
        $params = [];
        if ($request->input()) {
            if ($request->has(self::BRAND)) {
                foreach ($request->input(self::BRAND) as $brand) {
                    $params[self::BRAND][] = $brand;
                }
                $this->queryBuilder = $this->queryBuilder->whereIn(self::BRAND . '_id', $params[self::BRAND]);
                $this->appends[self::BRAND] = $request->get(self::BRAND);
            }
            if ($request->has(self::TYPE)) {
                foreach ($request->input(self::TYPE) as $type) {
                    $params[self::TYPE][] = $type;
                }
                $this->queryBuilder = $this->queryBuilder->whereIn(self::TYPE . '_id', $params[self::TYPE]);
                $this->appends[self::TYPE] = $request->get(self::TYPE);
            }
            if ($request->has(self::MAX_PRICE)) {
                $param = $request->get(self::MAX_PRICE) ?? 999999;
                $this->queryBuilder = $this->queryBuilder->where('price', '<=', $param);
                $this->appends[self::MAX_PRICE] = $request->get(self::MAX_PRICE);

            }
            if ($request->has(self::MIN_PRICE)) {
                $param = $request->get(self::MIN_PRICE) ?? 0;
                $this->queryBuilder = $this->queryBuilder->where('price', '>=', $param);
                $this->appends[self::MIN_PRICE] = $request->get(self::MIN_PRICE);
            }
        }
        return $this->queryBuilder;
    }

}