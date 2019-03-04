<?php
/**
 * Created by PhpStorm.
 * User: a.neposedov
 * Date: 01.03.2019
 * Time: 14:39
 */

namespace App\Services\FilterCondition;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

interface FilterConditionServiceInterface
{
    /**
     * @param Request $request
     * @return LengthAwarePaginator
     */
    public function filter(Request $request);
}