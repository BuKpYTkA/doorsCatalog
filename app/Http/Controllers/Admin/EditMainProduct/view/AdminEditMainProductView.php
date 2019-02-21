<?php

namespace App\Http\Controllers\Admin\EditMainProduct\view;

use App\Repository\MainProductRepository\MainProductRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminEditMainProductView extends Controller
{

    /**
     * @var MainProductRepositoryInterface
     */
    private $mainProductRepository;

    /**
     * AdminEditMainProductView constructor.
     * @param MainProductRepositoryInterface $mainProductRepository
     */
    public function __construct(MainProductRepositoryInterface $mainProductRepository)
    {
        $this->mainProductRepository = $mainProductRepository;
    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function __invoke(Request $request, int $id)
    {
        $mainProduct = $this->mainProductRepository->findOrFail($id);
        if ($request->post()) {
            $mainProduct = $this->mainProductRepository->find($id);
            $mainProduct->setTitle($request->post('title'));
            $mainProduct->setBrand($request->get('brand'));
            $mainProduct->setDescription($request->get('description') ?? '');
            $mainProduct->setPrice($request->get('price'));
            $this->mainProductRepository->save();
        }
        return view('admin.mainProduct.edit.view', ['mainProduct' => $mainProduct]);
    }
}
