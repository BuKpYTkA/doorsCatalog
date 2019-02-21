<?php

namespace App\Http\Controllers;

use App\Entity\AdditionalProduct\AdditionalProduct;
use App\Entity\Image\Image;
use App\Entity\MainProduct\MainProduct;
use App\Entity\Product\Product;
use App\Factory\AdditionalProductFactory\AdditionalProductFactory;
use App\Factory\MainProductFactory\MainProductFactory;
use App\Repository\AdditionalProductRepository\AdditionalProductRepository;
use App\Repository\AdditionalProductRepository\AdditionalProductRepositoryInterface;
use App\Repository\MainProductRepository\MainProductRepository;
use App\Repository\MainProductRepository\MainProductRepositoryInterface;
use DemeterChain\Main;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    /**
     * @var MainProductRepositoryInterface
     */
    private $mainProductRepository;

    /**
     * @var AdditionalProductRepositoryInterface
     */
    private $additionalProductRepository;

    public function __construct(MainProductRepository $mainProductRepository, AdditionalProductRepository $additionalProductRepository)
    {
        $this->mainProductRepository = $mainProductRepository;
        $this->additionalProductRepository = $additionalProductRepository;
    }

    public function getDescription()
    {
        $product = $this->mainProductRepository->find(9);
        $images = $this->mainProductRepository->findImages($product);
        dd($images);
        return view('lol', [
            'description' => $product->getTitle(),
        ]);
    }
}
