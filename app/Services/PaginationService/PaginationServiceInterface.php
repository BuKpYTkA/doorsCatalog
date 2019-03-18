<?php
/**
 * Created by PhpStorm.
 * User: a.neposedov
 * Date: 18.03.2019
 * Time: 16:16
 */

namespace App\Services\PaginationService;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

interface PaginationServiceInterface
{
    /**
     * @param $queryBuilder
     * @param Request $request
     * @param array $appends
     * @return LengthAwarePaginator
     */
    public function paginate($queryBuilder, Request $request, array $appends = []);
}