<?php

namespace App\Http\Controllers\Admin\MainProduct;

use App\Entity\Image\Image;
use App\Repository\MainProductRepository\MainProductRepositoryInterface;
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
        $pag = 5;
        if ($request->cookie('pag')) {
            $pag = $request->cookie('pag');
        }
        $products = $this->mainProductRepository->findAll($pag);
        return view('admin.mainProduct.index', ['products' => $products]);
    }
}
