<?php

namespace App\Http\Controllers\Admin\MainProduct;

use App\Entity\Brand\Brand;
use App\Entity\Image\Image;
use App\Entity\MainProduct\MainProduct;
use App\Entity\ProductTypes\MainProductType;
use App\Repository\MainProductRepository\MainProductRepositoryInterface;
use App\Services\FilterCondition\FilterConditionServiceInterface;
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
        $product = MainProduct::with('images')->find([2, 5]);
        dd($product->toArray());
        $products = $this->filterConditionService->filter($request);
        foreach ($products as $product) {
            $product->setImages($this->mainProductRepository->findImages($product));
        }
        $arr = [];
        foreach ($products->items() as $item) {
            $arr[] = $item->toArray();
        }
        $brands = Brand::all()->toArray();
        $types = MainProductType::all()->toArray();
        $maxPrice = MainProduct::orderBy('price', 'desc')->first()->toArray()['price'];
        return view('admin.mainProduct.index', [
            'products' => $arr,
            'links' => $products->links(),
            'brands' => $brands,
            'types' => $types,
            'request' => $request->input(),
            'maxPrice' => $maxPrice,
        ]);
    }

}
