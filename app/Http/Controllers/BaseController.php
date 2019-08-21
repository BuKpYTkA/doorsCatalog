<?php

namespace App\Http\Controllers;

use App\Entity\MainProduct\MainProduct;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $products = MainProduct::query()->get();
        return view('mainProducts', [
            'products' => $products
        ]);
    }
}
