<?php

namespace App\Http\Controllers\Admin\AdditionalProduct;

use App\Repository\AdditionalProductRepository\AdditionalProductRepositoryInterface;
use App\Services\PaginationValues\PaginationValues;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdditionalProducts extends Controller
{

    /**
     * @var AdditionalProductRepositoryInterface
     */
    private $additionalProductRepository;

    /**
     * AdditionalProducts constructor.
     * @param AdditionalProductRepositoryInterface $additionalProductRepository
     */
    public function __construct(AdditionalProductRepositoryInterface $additionalProductRepository)
    {
        $this->additionalProductRepository = $additionalProductRepository;
    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $paginationValues = PaginationValues::PAGINATION_VALUES;
        $pag = PaginationValues::DEFAULT;
        if ($request->cookie(md5(route('admin.show.additional.products').'pagination'))) {
            $pag = $request->cookie(md5(route('admin.show.additional.products').'pagination'));
        }
        $products = $this->additionalProductRepository->findAll($pag);
        return view('admin.additionalProduct.index', [
            'products' => $products,
            'paginationValues' => $paginationValues,
        ]);
    }

}
