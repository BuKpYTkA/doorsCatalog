<?php

namespace App\Http\Controllers;

use App\Entity\MainProduct\MainProduct;
use App\Http\Resources\MainProductResource;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function getAllProducts()
    {
        $products = MainProduct::query()->orderBy('created_at', 'desc')->paginate(7);
        return MainProductResource::collection($products);
    }
}
