<?php

namespace App\Http\Controllers\Admin\AdditionalProduct\Delete;

use App\Repository\AdditionalProductRepository\AdditionalProductRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DeleteAdditionalProduct extends Controller
{

    /**
     * @var AdditionalProductRepositoryInterface
     */
    private $additionalProductRepository;

    /**
     * DeleteAdditionalProduct constructor.
     * @param AdditionalProductRepositoryInterface $additionalProductRepository
     */
    public function __construct(AdditionalProductRepositoryInterface $additionalProductRepository)
    {
        $this->additionalProductRepository = $additionalProductRepository;
    }

    /**
     * Handle the incoming request.
     * @param  \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function __invoke(Request $request, int $id)
    {
        if ($id) {
            $product = $this->additionalProductRepository->findOrFail($id);
            if ($product) {
                $this->additionalProductRepository->delete($product);
            }
        }
        return redirect( route('admin.show.additional.products'));
    }

}
