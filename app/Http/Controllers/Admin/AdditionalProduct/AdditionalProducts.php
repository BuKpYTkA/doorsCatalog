<?php

namespace App\Http\Controllers\Admin\AdditionalProduct;

use App\Repository\AdditionalProductRepository\AdditionalProductRepositoryInterface;
use App\Repository\ProductTypeRepository\AdditionalTypeRepository;
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
     * @var AdditionalTypeRepository
     */
    private $typeRepo;

    /**
     * AdditionalProducts constructor.
     * @param AdditionalProductRepositoryInterface $additionalProductRepository
     * @param AdditionalTypeRepository $typeRepo
     */
    public function __construct(AdditionalProductRepositoryInterface $additionalProductRepository, AdditionalTypeRepository $typeRepo)
    {
        $this->additionalProductRepository = $additionalProductRepository;
        $this->typeRepo = $typeRepo;
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
        $products = $this->additionalProductRepository->findAll($pag);
        foreach ($products as $product) {
            $product->setType($this->additionalProductRepository->findType($product));
        }
        if ($request->get('page') > $products->lastPage()) {
            abort(404);
        }
        return view('admin.additionalProduct.index', [
            'products' => $products,
            'paginationValues' => $paginationValues,
            'pagination' => $pag,
        ]);
    }

}
