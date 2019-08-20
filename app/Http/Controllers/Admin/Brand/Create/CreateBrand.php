<?php

namespace App\Http\Controllers\Admin\Brand\Create;

use App\Entity\Brand\Brand;
use App\Repository\BrandRepository\BrandRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CreateBrand extends Controller
{

    /**
     * @var BrandRepositoryInterface
     */
    private $brandRepository;

    /**
     * CreateBrand constructor.
     * @param BrandRepositoryInterface $brandRepository
     */
    public function __construct(BrandRepositoryInterface $brandRepository)
    {
        $this->brandRepository = $brandRepository;
    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        if ($request->input(['new_brand'])) {
            $brandName = $request->input(['new_brand']);
//            Brand::updateOrCreate(['title' => $brandName], ['title' => $brandName]);
//            Brand::create(['title' => $brandName]);
            $this->brandRepository->updateOrCreate(['title' => $brandName], ['title' => $brandName]);
        }
        return redirect(route('admin.show.main.products'));
    }
}
