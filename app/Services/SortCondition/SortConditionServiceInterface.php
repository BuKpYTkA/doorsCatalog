<?php
/**
 * Created by PhpStorm.
 * User: a.neposedov
 * Date: 01.03.2019
 * Time: 14:37
 */

namespace App\Services\SortCondition;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

interface SortConditionServiceInterface
{
    /**
     * @param $queryBuilder
     * @param Request $request
     * @param array $appends
     * @return LengthAwarePaginator
     */
    public function sort($queryBuilder, Request $request, array $appends);
}