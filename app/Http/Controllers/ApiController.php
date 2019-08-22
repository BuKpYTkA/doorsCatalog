<?php

namespace App\Http\Controllers;

use App\Entity\MainProduct\MainProduct;
use App\Http\Resources\MainProductResource;
use Illuminate\Http\Request;

/**
 * Class ApiController
 * @package App\Http\Controllers
 */
class ApiController extends Controller
{

    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function getAllProducts()
    {
        $products = MainProduct::query()->orderBy('created_at', 'desc')->paginate(5);
        $products->withPath('products');
        return MainProductResource::collection($products);
    }

    /**
     * @param Request $request
     * @return MainProductResource
     * @throws \Exception
     */
    public function deleteProduct(Request $request)
    {
        $productId = $request->input('id');
        $product = MainProduct::query()->findOrFail($productId);
        $product->delete();
        return new MainProductResource($product);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function autocompleteProducts(Request $request)
    {
        $token = $request->input('token');
        $products = MainProduct::query()->where('title', 'like', '%' . $token . '%')->get();
        return MainProductResource::collection($products);
    }
}
