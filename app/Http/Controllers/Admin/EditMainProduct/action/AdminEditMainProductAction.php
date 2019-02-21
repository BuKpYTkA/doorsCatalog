<?php

namespace App\Http\Controllers\Admin\EditMainProduct\action;

use App\Repository\MainProductRepository\MainProductRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminEditMainProductAction extends Controller
{

    /**
     * @var MainProductRepositoryInterface
     */
    private $mainProductRepository;

    /**
     * AdminEditMainProductAction constructor.
     * @param MainProductRepositoryInterface $mainProductRepository
     */
    public function __construct(MainProductRepositoryInterface $mainProductRepository)
    {
        $this->mainProductRepository = $mainProductRepository;
    }


    public function __invoke(Request $request, int $id)
    {
        $mainProduct = $this->mainProductRepository->find($id);
        $mainProduct->setTitle($request->get('title'));
        $mainProduct->setBrand($request->get('brand'));
        $mainProduct->setDescription($request->get('description') ?? '');
        $mainProduct->setPrice($request->get('price'));
        $this->mainProductRepository->save($mainProduct);
        redirect(route('admin.edit.main.product.view'));
    }
}
