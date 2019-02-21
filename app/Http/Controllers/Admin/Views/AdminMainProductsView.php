<?php

namespace App\Http\Controllers\Admin\Views;

use App\Repository\MainProductRepository\MainProductRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminMainProductsView extends Controller
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
        $products = $this->mainProductRepository->findAll(5);
        return view('admin.mainProduct.index', ['products' => $products]);
    }
}
