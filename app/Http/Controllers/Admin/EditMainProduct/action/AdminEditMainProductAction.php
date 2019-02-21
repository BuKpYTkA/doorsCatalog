<?php

namespace App\Http\Controllers\Admin\EditMainProduct\action;

use App\Repository\MainProductRepository\MainProductRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminEditMainProductAction extends Controller
{

    /**
     * @var MainProductRepositoryInterface
     */
    private $mainProductRepository;

    /**
     * AdminEditMainProductAction constructor.
     * @param MainProductRepositoryInterface $mainProductRepository
     */
    public function __construct(MainProductRepositoryInterface $mainProductRepository)
    {
        $this->mainProductRepository = $mainProductRepository;
    }


    public function __invoke(Request $request, int $id)
    {

        redirect(route('admin.edit.main.product.view'));
    }
}
