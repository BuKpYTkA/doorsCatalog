<?php
/**
 * Created by PhpStorm.
 * User: a.neposedov
 * Date: 01.03.2019
 * Time: 14:37
 */

namespace App\Services\SortCondition;

use Illuminate\Http\Request;

interface SortConditionServiceInterface
{
    /**
     * @param $mainProducts
     * @param Request $request
     * @param array $appends
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function sort($mainProducts, Request $request, array $appends);
}