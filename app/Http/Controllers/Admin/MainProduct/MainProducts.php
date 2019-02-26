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
        $pag = $request->get('per_page');
        if (!$pag || !in_array($pag, $paginationValues)) {
            $pag = PaginationValues::DEFAULT;
        }
        $products = $this->mainProductRepository->findAll($pag);
        if ($request->get('per_page')) {
            $products->appends(['per_page' => $pag]);
        }
        foreach ($products as $product) {
            $product->setImages($this->mainProductRepository->findImages($product));
        }
        if ($request->get('page') > $products->lastPage()) {
            abort(404);
        }
        $links = $products->links();
        return view('admin.mainProduct.index', [
            'products' => $products,
            'paginationValues' => $paginationValues,
            'links' => $links,
        ]);
    }

}
