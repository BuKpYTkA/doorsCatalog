<?php

namespace App\Http\Controllers\Admin\MainProduct;

use App\Entity\Brand\Brand;
use App\Entity\FeedBack\Feedback;
use App\Entity\MainProduct\MainProduct;
use App\Entity\ProductTypes\MainProductType;
use App\Repository\BrandRepository\BrandRepository;
use App\Repository\FeedBackRepository\FeedBackRepository;
use App\Repository\MainProductRepository\MainProductRepositoryInterface;
use App\Repository\ProductTypeRepository\MainTypeRepository;
use App\Services\FilterCondition\FilterConditionService;
use App\Services\FilterCondition\FilterConditionServiceInterface;
use App\Services\SortCondition\SortConditionService;
use App\Services\PaginationValues\PaginationValues;
use App\Services\SortCondition\SortConditionServiceInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MainProducts extends Controller
{

    /**
     * @var MainProductRepositoryInterface
     */
    private $mainProductRepository;

    /**
     * @var FilterConditionServiceInterface
     */
    private $filterConditionService;

    /**
     * @var SortConditionServiceInterface
     */
    private $sorterConditionService;

    /**
     * MainProducts constructor.
     * @param MainProductRepositoryInterface $mainProductRepository
     * @param FilterConditionServiceInterface $filterConditionService
     * @param SortConditionServiceInterface $sorterConditionService
     */
    public function __construct(MainProductRepositoryInterface $mainProductRepository, FilterConditionServiceInterface $filterConditionService, SortConditionServiceInterface $sorterConditionService)
    {
        $this->mainProductRepository = $mainProductRepository;
        $this->filterConditionService = $filterConditionService;
        $this->sorterConditionService = $sorterConditionService;
    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $paginationValues = PaginationValues::PAGINATION_VALUES;
//
//        $products = $this->filterConditionService->filter($request);
//        $filtered = $this->sorterConditionService->sort($products, $request);
//        $links = $filtered['links'];
//        $products = $filtered['mainProducts'];
//        $brands = Brand::find([1,2,3])->all();
//        $products = $this->mainProductRepository->filterByBrands($brands);
        $products = $this->filterConditionService->filter($request);
        return view('admin.mainProduct.index', [
            'products' => $products,
            'paginationValues' => $paginationValues,
            'links' => $products->links(),
        ]);
    }

}
