<?php

namespace App\Http\Controllers\Admin\AdditionalProduct\Create;

use App\Factory\AdditionalProductFactory\AdditionalProductFactoryInterface;
use App\Repository\AdditionalProductRepository\AdditionalProductRepositoryInterface;
use App\Repository\ProductTypeRepository\AdditionalTypeRepository;
use App\Services\ValidationRules\ValidationRulesServiceInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CreateAdditionalProduct extends Controller
{

    /**
     * @var AdditionalProductFactoryInterface
     */
    private $additionalProductFactory;

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
     * CreateAdditionalProduct constructor.
     * @param AdditionalProductFactoryInterface $additionalProductFactory
     * @param AdditionalProductRepositoryInterface $additionalProductRepository
     * @param ValidationRulesServiceInterface $validationRules
     * @param AdditionalTypeRepository $typeRepository
     */
    public function __construct(AdditionalProductFactoryInterface $additionalProductFactory,
                                AdditionalProductRepositoryInterface $additionalProductRepository,
                                ValidationRulesServiceInterface $validationRules,
                                AdditionalTypeRepository $typeRepository)
    {
        $this->additionalProductFactory = $additionalProductFactory;
        $this->additionalProductRepository = $additionalProductRepository;
        $this->validationRules = $validationRules;
        $this->typeRepository = $typeRepository;
    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Validation\ValidationException
     */
    public function __invoke(Request $request)
    {
        $types = $this->typeRepository->findAll();
        if ($request->post()) {
            return $this->postRequest($request);
        }
        return view('admin.additionalProduct.create.createAdditionalProduct', [
            'types' => $types,
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Validation\ValidationException
     */
    private function postRequest(Request $request)
    {
        $this->validate($request, $this->validationRules->getAdditionalProductRules());
        $additionalProduct = $this->makeAdditionalProduct($request);
        return redirect(route('admin.edit.additional.product', $additionalProduct->getId()));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Database\Eloquent\Model
     */
    private function makeAdditionalProduct(Request $request)
    {
        $title = $request->post('title');
        $price = $request->post('price');
        $type = $request->post('type');
        $isActive = false;
        if ($request->post('isActive')) {
            $isActive = true;
        }
        $additionalProduct = $this->additionalProductFactory->create($title, $price, $type, $isActive);
        $this->additionalProductRepository->save($additionalProduct);
        return $additionalProduct;
    }

}
