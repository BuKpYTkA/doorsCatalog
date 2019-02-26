<?php

namespace App\Http\Controllers\Admin\MainProduct\Edit;

use App\Entity\Image\ImageInterface;
use App\Entity\MainProduct\MainProductInterface;
use App\Factory\ImageFactory\ImageFactoryInterface;
use App\Repository\BrandRepository\BrandRepository;
use App\Repository\BrandRepository\BrandRepositoryInterface;
use App\Repository\ImageRepository\ImageRepositoryInterface;
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
     * @var ImageRepositoryInterface
     */
    private $imageRepository;

    /**
     * @var ImageFactoryInterface
     */
    private $imageFactory;

    /**
     * EditMainProduct constructor.
     * @param MainProductRepositoryInterface $mainProductRepository
     * @param ValidationRulesServiceInterface $validationRules
     * @param MainTypeRepository $typeRepository
     * @param BrandRepository $brandRepository
     * @param ImageRepositoryInterface $imageRepository
     * @param ImageFactoryInterface $imageFactory
     */
    public function __construct(MainProductRepositoryInterface $mainProductRepository,
                                ValidationRulesServiceInterface $validationRules,
                                MainTypeRepository $typeRepository,
                                BrandRepository $brandRepository,
                                ImageRepositoryInterface $imageRepository, ImageFactoryInterface $imageFactory)
    {
        $this->mainProductRepository = $mainProductRepository;
        $this->validationRules = $validationRules;
        $this->typeRepository = $typeRepository;
        $this->brandRepository = $brandRepository;
        $this->imageRepository = $imageRepository;
        $this->imageFactory = $imageFactory;
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
        if ($request->post()) {
            $mainProduct = $this->postRequest($request, $mainProduct);
        }
        $images = $this->mainProductRepository->findImages($mainProduct);
        $mainProduct->setImages($images);
        $types = $this->typeRepository->findAll();
        $brands = $this->brandRepository->findAll();
        return view('admin.mainProduct.edit.editMainProduct', [
            'mainProduct' => $mainProduct,
//            'images' => $images,
            'types' => $types,
            'brands' => $brands,
        ]);
    }

    /**
     * @param Request $request
     * @param MainProductInterface $mainProduct
     * @return \App\Entity\MainProduct\MainProductInterface
     * @throws \Illuminate\Validation\ValidationException
     */
    private function postRequest(Request $request, MainProductInterface $mainProduct)
    {
        $this->validate($request, $this->validationRules->getMainProductRules());
        $this->editMainProduct($request, $mainProduct);
        $images = $this->editImages($request, $mainProduct);
        $mainProduct->setImages($images);
        return $mainProduct;
    }

    /**
     * @param Request $request
     * @param MainProductInterface $mainProduct
     * @return void
     */
    private function editMainProduct(Request $request, MainProductInterface $mainProduct)
    {
        $mainProduct->setTitle($request->post('title'));
        $mainProduct->setBrandId($request->post('brand'));
        $mainProduct->setDescription($request->post('description') ?? '');
        $mainProduct->setPrice($request->post('price'));
        $mainProduct->setTypeId($request->post('type'));
        $this->mainProductRepository->save($mainProduct);
    }

    /**
     * @param Request $request
     * @param MainProductInterface $mainProduct
     * @return ImageInterface[]
     */
    private function editImages(Request $request, MainProductInterface $mainProduct)
    {
        $images = $this->mainProductRepository->findImages($mainProduct);
        foreach ($images as $image) {
            $this->imageRepository->delete($image);
        }
        foreach ($request->all() as $key => $value) {
            if (preg_match('/^image/', $key)) {
                if ($value) {
                    $image = $this->imageFactory->create($mainProduct->getId(), $value);
                    $this->imageRepository->save($image);
                }
            }
        }
        return $images;
    }

}
