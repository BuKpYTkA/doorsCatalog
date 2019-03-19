<?php
/**
 * Created by PhpStorm.
 * User: a.neposedov
 * Date: 01.03.2019
 * Time: 14:39
 */

namespace App\Services\FilterCondition;

use Illuminate\Http\Request;

interface FilterConditionServiceInterface
{
    /**
     * @param Request $request
     * @param bool|null $isActive
     * @return array
     */
    public function filter(Request $request, bool $isActive = null);
}