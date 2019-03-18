<?php

namespace App\Http\Controllers\Admin\MainProduct\GetFiltered;

use App\Services\FilterCondition\FilterConditionServiceInterface;
use App\Services\PaginationService\PaginationValues;
use App\Services\SortCondition\SortConditionServiceInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GetFilteredMainProducts extends Controller
{

    /**
     * @var FilterConditionServiceInterface
     */
    private $filterConditionService;

    /**
     * @var SortConditionServiceInterface
     */
    private $sortConditionService;

    /**
     * GetFilteredMainProducts constructor.
     * @param FilterConditionServiceInterface $filterConditionService
     * @param SortConditionServiceInterface $sortConditionService
     */
    public function __construct(FilterConditionServiceInterface $filterConditionService, SortConditionServiceInterface $sortConditionService)
    {
        $this->filterConditionService = $filterConditionService;
        $this->sortConditionService = $sortConditionService;
    }


    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $products = $this->filterConditionService->filter($request);
        if (!$products) {
            return redirect(route('admin.show.main.products'));
        }
        $filtered = $this->sortConditionService->sort($products, $request);
        $links = $filtered['links'];
        $products = $filtered['mainProducts'];

        return view('admin.mainProduct.index', [
            'products' => $products,
            'paginationValues' => PaginationValues::PAGINATION_VALUES,
            'links' => $links,
        ]);
    }
}
