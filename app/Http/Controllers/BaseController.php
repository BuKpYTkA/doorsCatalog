<?php

namespace App\Http\Controllers;

use App\Entity\MainProduct\MainProduct;
use App\Mail\TestMailable;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
//        Mail::to(User::query()->find(1))->send(new TestMailable(MainProduct::query()->find(1)));
        $product = MainProduct::query()->find(1);
        /**
         * @var $product MainProduct
         */
        $images = $product->images()->get();
        $products = MainProduct::query()->active()->get();
        return view('mainProducts', [
            'products' => $products
        ]);
    }
}
