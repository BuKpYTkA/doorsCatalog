<?php

namespace App\Http\Controllers\Admin\MainProduct\Delete;

use App\Repository\MainProductRepository\MainProductRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DeleteMainProduct extends Controller
{

    /**
     * @var MainProductRepositoryInterface
     */
    private $mainProductRepository;

    /**
     * DeleteMainProduct constructor.
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
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function __invoke(Request $request)
    {
        if ($request->post()) {
            $productId = $request->input('productId');
            if ($productId) {
                $product = $this->mainProductRepository->findOrFail($productId);
                $this->mainProductRepository->delete($product);
                $products = $this->mainProductRepository->withRelations()->get();
                return $this->successResult($products->toArray());
            }
        }
        return redirect(route('admin.show.main.products'));
    }

}
