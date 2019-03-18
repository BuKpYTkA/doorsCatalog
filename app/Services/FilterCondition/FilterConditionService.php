<?php
/**
 * Created by PhpStorm.
 * User: a.neposedov
 * Date: 01.03.2019
 * Time: 13:54
 */

namespace App\Services\FilterCondition;


use App\Entity\ProductTypes\MainProductType;
use App\Repository\BrandRepository\BrandRepositoryInterface;
use App\Repository\MainProductRepository\MainProductRepositoryInterface;
use App\Repository\ProductTypeRepository\MainTypeRepository;
use App\Services\PaginationValues\PaginationValues;
use App\Services\SortCondition\SortConditionService;
use App\Services\SortCondition\SortConditionServiceInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class FilterConditionService implements FilterConditionServiceInterface
{

    const PAGINATION_GETTER = 'per_page';
    const BRAND = 'brand';
    const TYPE = 'type';
    const PRICE = 'price';

    /**
     * @var MainProductRepositoryInterface
     */
    private $mainProductRepository;

    /**
     * @var BrandRepositoryInterface
     */
    private $brandRepository;

    /**
     * @var SortConditionServiceInterface
     */
    private $sortConditionService;

    /**
     * @var array
     */
    private $params;

    /**
     * @var array
     */
    private $appends;

    /**
     * @var MainTypeRepository
     */
    private $typeRepository;

    /**
     * FilterConditionService constructor.
     * @param MainProductRepositoryInterface $mainProductRepository
     * @param BrandRepositoryInterface $brandRepository
     * @param SortConditionServiceInterface $sortConditionService
     * @param MainTypeRepository $typeRepository
     */
    public function __construct(MainProductRepositoryInterface $mainProductRepository, BrandRepositoryInterface $brandRepository, SortConditionServiceInterface $sortConditionService, MainTypeRepository $typeRepository)
    {
        $this->mainProductRepository = $mainProductRepository;
        $this->brandRepository = $brandRepository;
        $this->sortConditionService = $sortConditionService;
        $this->typeRepository = $typeRepository;
    }


    /**
     * @param Request $request
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function filter(Request $request)
    {
        $this->filterByBrand($request);
        $products = null;
        if ($this->params) {
            $products = $this->mainProductRepository->findWhere($this->params);
        }
        return $this->sortConditionService->sort($products, $request, $this->appends);
    }

    /**
     * @param Request $request
     */
    private function filterByBrand(Request $request)
    {
        $brandIds = explode(',',$request->input(self::BRAND));
        if ($brandIds[0]) {
            foreach ($brandIds as $id) {
                if ($this->brandRepository->find($id)) {
                    $this->params[self::BRAND . '_id'][] = $id;
                }
            }
            $this->appends[self::BRAND] = $request->get(self::BRAND);
        }
        $this->filterByType($request);
    }

    /**
     * @param Request $request
     */
    private function filterByType(Request $request)
    {
        $typeIds = explode(',',$request->get(self::TYPE));
        if ($typeIds[0]) {
            foreach ($typeIds as $id) {
                if ($this->typeRepository->find($id)) {
                    $this->params[self::TYPE . '_id'][] = $id;
                }
            }
            $this->appends[self::TYPE] = $request->get(self::TYPE);
        }
    }

}