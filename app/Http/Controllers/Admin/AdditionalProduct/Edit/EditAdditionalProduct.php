<?php

namespace App\Http\Controllers\Admin\AdditionalProduct\Edit;

use App\Repository\AdditionalProductRepository\AdditionalProductRepositoryInterface;
use App\Repository\ProductTypeRepository\AdditionalTypeRepository;
use App\Services\ValidationRules\ValidationRulesServiceInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EditAdditionalProduct extends Controller
{

    /**
     * @var AdditionalProductRepositoryInterface
     */
    private $additionalProductRepository;

    /**
     * @var ValidationRulesServiceInterface
     */
    private $validationRules;

    /**
     * @var AdditionalTypeRepository
     */
    private $typeRepository;

    /**
     * EditAdditionalProduct constructor.
     * @param AdditionalProductRepositoryInterface $additionalProductRepository
     * @param ValidationRulesServiceInterface $validationRules
     * @param AdditionalTypeRepository $typeRepository
     */
    public function __construct(AdditionalProductRepositoryInterface $additionalProductRepository,
                                ValidationRulesServiceInterface $validationRules,
                                AdditionalTypeRepository $typeRepository)
    {
        $this->additionalProductRepository = $additionalProductRepository;
        $this->validationRules = $validationRules;
        $this->typeRepository = $typeRepository;
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
        $additionalProduct = $this->additionalProductRepository->findOrFail($id);
        $types = $this->typeRepository->findAll();
        if ($request->post()) {
            $additionalProduct = $this->postRequest($request, $id);
        }
        return view('admin.additionalProduct.edit.editAdditionalProduct', [
            'additionalProduct' => $additionalProduct,
            'types' => $types,
            ]);
    }

    /**
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Model
     * @throws \Illuminate\Validation\ValidationException
     */
    private function postRequest(Request $request, int $id)
    {
        $this->validate($request, $this->validationRules->getAdditionalProductRules());
        $additionalProduct = $this->additionalProductRepository->find($id);
        $additionalProduct->setTitle($request->post('title'));
        $additionalProduct->setPrice($request->post('price'));
        $additionalProduct->setTypeId($request->post('type'));
        $additionalProduct->setIsActive($request->post('isActive') ? true : false);
        $this->additionalProductRepository->save($additionalProduct);
        return $additionalProduct;
    }
}
