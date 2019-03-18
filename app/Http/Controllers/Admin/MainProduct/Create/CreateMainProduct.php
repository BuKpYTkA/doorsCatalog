<?php

namespace App\Http\Controllers\Admin\MainProduct\Create;

use App\Entity\MainProduct\MainProductInterface;
use App\Factory\ImageFactory\ImageFactoryInterface;
use App\Factory\MainProductFactory\MainProductFactoryInterface;
use App\Repository\BrandRepository\BrandRepository;
use App\Repository\BrandRepository\BrandRepositoryInterface;
use App\Repository\ImageRepository\ImageRepositoryInterface;
use App\Repository\MainProductRepository\MainProductRepositoryInterface;
use App\Repository\ProductTypeRepository\MainTypeRepository;
use App\Services\ValidationRules\ValidationRulesServiceInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CreateMainProduct extends Controller
{

    /**
     * @var MainProductFactoryInterface
     */
    private $mainProductFactory;

    /**
     * @var MainProductRepositoryInterface
     */
    private $mainProductRepository;

    /**
     * @var ValidationRulesServiceInterface
     */
    private $validationRules;

    /**
     * @var ImageRepositoryInterface
     */
    private $imageRepository;

    /**
     * @var ImageFactoryInterface
     */
    private $imageFactory;

    /**
     * @var MainTypeRepository
     */
    private $typeRepository;

    /**
     * @var BrandRepository
     */
    private $brandRepository;

    /**
     * CreateMainProduct constructor.
     * @param MainProductFactoryInterface $mainProductFactory
     * @param MainProductRepositoryInterface $mainProductRepository
     * @param ValidationRulesServiceInterface $validationRules
     * @param ImageRepositoryInterface $imageRepository
     * @param ImageFactoryInterface $imageFactory
     * @param MainTypeRepository $typeRepository
     * @param BrandRepositoryInterface $brandRepository
     */
    public function __construct(MainProductFactoryInterface $mainProductFactory,
                                MainProductRepositoryInterface $mainProductRepository,
                                ValidationRulesServiceInterface $validationRules,
                                ImageRepositoryInterface $imageRepository,
                                ImageFactoryInterface $imageFactory,
                                MainTypeRepository $typeRepository,
                                BrandRepositoryInterface $brandRepository)
    {
        $this->mainProductFactory = $mainProductFactory;
        $this->mainProductRepository = $mainProductRepository;
        $this->validationRules = $validationRules;
        $this->imageRepository = $imageRepository;
        $this->imageFactory = $imageFactory;
        $this->typeRepository = $typeRepository;
        $this->brandRepository = $brandRepository;
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
        if ($request->post()) {
            return $this->postRequest($request);
        }
        return view('admin.mainProduct.create.createMainProduct', [
            'types' => $this->typeRepository->findAll(),
            'brands' => $this->brandRepository->findAll()
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Validation\ValidationException
     */
    private function postRequest(Request $request)
    {
        $this->validate($request, $this->validationRules->getMainProductRules());
        $mainProduct = $this->makeMainProduct($request);
        $this->makeImagesForProduct($request, $mainProduct);
        return redirect(route('admin.edit.main.product', $mainProduct->getId()));
    }

    /**
     * @param $request
     * @return \App\Entity\MainProduct\MainProductInterface
     */
    private function makeMainProduct(Request $request)
    {
        $title = $request->post('title');
        $price = $request->post('price');
        $brand = $request->post('brand');
        $description = $request->post('description');
        $type = $request->post('type');
        $isActive = false;
        if ($request->post('isActive')) {
            $isActive = true;
        }
        $mainProduct = $this->mainProductFactory->create($title, $price, $brand, $description, $type, $isActive);
        $this->mainProductRepository->save($mainProduct);
        return $mainProduct;
    }

    /**
     * @param Request $request
     * @param MainProductInterface $mainProduct
     */
    private function makeImagesForProduct(Request $request, MainProductInterface $mainProduct)
    {
        foreach ($request->all() as $key => $value) {
            if (preg_match('/^image/', $key)) {
                if ($value) {
                    $image = $this->imageFactory->create($mainProduct->getId(), $value);
                    $this->imageRepository->save($image);
                }
            }
        }
    }

}
