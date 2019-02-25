<?php

namespace App\Http\Controllers\Admin\MainProduct;

use App\Repository\MainProductRepository\MainProductRepositoryInterface;
use App\Services\PaginationValues\PaginationValues;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MainProducts extends Controller
{

    /**
     * @var MainProductRepositoryInterface
     */
    private $mainProductRepository;

    /**
     * AdminShowMainProducts constructor.
     * @param MainProductRepositoryInterface $mainProductRepository
     */
    public function __construct(MainProductRepositoryInterface $mainProductRepository)
    {
        $this->mainProductRepository = $mainProductRepository;
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
        if ($request->cookie(md5(route('admin.show.main.products').'pagination'))) {
            $pag = $request->cookie(md5(route('admin.show.main.products').'pagination'));
        }
        $products = $this->mainProductRepository->findAll($pag);
        return view('admin.mainProduct.index', [
            'products' => $products,
            'paginationValues' => $paginationValues,
        ]);
    }

}
