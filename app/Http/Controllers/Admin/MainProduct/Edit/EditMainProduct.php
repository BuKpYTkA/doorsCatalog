<?php

namespace App\Http\Controllers\Admin\MainProduct\Edit;

use App\Repository\BrandRepository\BrandRepository;
use App\Repository\BrandRepository\BrandRepositoryInterface;
use App\Repository\MainProductRepository\MainProductRepositoryInterface;
use App\Repository\ProductTypeRepository\MainTypeRepository;
use App\Services\ValidationRules\ValidationRulesServiceInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EditMainProduct extends Controller
{

    /**
     * @var MainProductRepositoryInterface
     */
    private $mainProductRepository;

    /**
     * @var ValidationRulesServiceInterface
     */
    private $validationRules;

    /**
     * @var MainTypeRepository
     */
    private $typeRepository;

    /**
     * @var BrandRepository
     */
    private $brandRepository;

    /**
     * EditMainProduct constructor.
     * @param MainProductRepositoryInterface $mainProductRepository
     * @param ValidationRulesServiceInterface $validationRules
     * @param MainTypeRepository $typeRepository
     * @param BrandRepositoryInterface $brandRepository
     */
    public function __construct(MainProductRepositoryInterface $mainProductRepository,
                                ValidationRulesServiceInterface $validationRules,
                                MainTypeRepository $typeRepository,
                                BrandRepositoryInterface $brandRepository)
    {
        $this->mainProductRepository = $mainProductRepository;
        $this->validationRules = $validationRules;
        $this->typeRepository = $typeRepository;
        $this->brandRepository = $brandRepository;
    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Validation\ValidationException
     */
    public function __invoke(Request $request, int $id)
    {
        $mainProduct = $this->mainProductRepository->findOrFail($id);
        $images = $this->mainProductRepository->findImages($mainProduct);
        $types = $this->typeRepository->findAll();
        $brands = $this->brandRepository->findAll();
        if ($request->post()) {
            $mainProduct = $this->postRequest($request, $id);
        }
        return view('admin.mainProduct.edit.editMainProduct', [
            'mainProduct' => $mainProduct,
            'images' => $images,
            'types' => $types,
            'brands' => $brands,
        ]);
    }

    /**
     * @param Request $request
     * @param int $id
     * @return \App\Entity\MainProduct\MainProduct
     * @throws \Illuminate\Validation\ValidationException
     */
    private function postRequest(Request $request, int $id)
    {
        $this->validate($request, $this->validationRules->getMainProductRules());
        $mainProduct = $this->mainProductRepository->find($id);
        $mainProduct->setTitle($request->post('title'));
        $mainProduct->setBrandId($request->post('brand'));
        $mainProduct->setDescription($request->post('description') ?? '');
        $mainProduct->setPrice($request->post('price'));
        $mainProduct->setTypeId($request->post('type'));
        $this->mainProductRepository->save($mainProduct);
        return $mainProduct;
    }

}
