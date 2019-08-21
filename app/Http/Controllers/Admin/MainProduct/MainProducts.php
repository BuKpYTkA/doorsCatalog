<?php

namespace App\Http\Controllers\Admin\MainProduct;

use App\Repository\BrandRepository\BrandRepositoryInterface;
use App\Repository\MainProductRepository\MainProductRepositoryInterface;
use App\Repository\ProductTypeRepository\MainTypeRepository;
use App\Services\FilterCondition\FilterConditionServiceInterface;
use App\Services\PaginationService\PaginationServiceInterface;
use App\Services\SortCondition\SortConditionServiceInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Predis\Client;

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
     * @var PaginationServiceInterface
     */
    private $paginationService;

    /**
     * @var BrandRepositoryInterface
     */
    private $brandRepository;

    /**
     * @var MainTypeRepository
     */
    private $typeRepository;

    /**
     * MainProducts constructor.
     * @param MainProductRepositoryInterface $mainProductRepository
     * @param FilterConditionServiceInterface $filterConditionService
     * @param SortConditionServiceInterface $sorterConditionService
     * @param PaginationServiceInterface $paginationService
     * @param BrandRepositoryInterface $brandRepository
     * @param MainTypeRepository $typeRepository
     */
    public function __construct(MainProductRepositoryInterface $mainProductRepository, FilterConditionServiceInterface $filterConditionService, SortConditionServiceInterface $sorterConditionService, PaginationServiceInterface $paginationService, BrandRepositoryInterface $brandRepository, MainTypeRepository $typeRepository)
    {
        $this->mainProductRepository = $mainProductRepository;
        $this->filterConditionService = $filterConditionService;
        $this->sorterConditionService = $sorterConditionService;
        $this->paginationService = $paginationService;
        $this->brandRepository = $brandRepository;
        $this->typeRepository = $typeRepository;
    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
//        $redis = new Client();
//        $redis->set('key', 2);
        $filteredProducts = $this->filterConditionService->filter($request);
        $filteredProductsBuilder = $filteredProducts['builder'];
        $sorted = $this->sorterConditionService->sort($filteredProductsBuilder, $request, $filteredProducts['appends']);
        $paginated = $this->paginationService->paginate($sorted['builder'], $request, $sorted['appends']);
        return view('admin.mainProduct.index', [
            'products' => $paginated->getCollection()->toArray(),
            'links' => $paginated->links(),
            'brands' => $this->brandRepository->findAll()->toArray(),
            'types' => $this->typeRepository->findAll()->toArray(),
            'request' => $request->input(),
            'maxPrice' => $filteredProductsBuilder->get()->max('price'),
        ]);
    }

}
