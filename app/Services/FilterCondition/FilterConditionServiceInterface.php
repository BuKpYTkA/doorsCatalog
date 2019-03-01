<?php
/**
 * Created by PhpStorm.
 * User: a.neposedov
 * Date: 01.03.2019
 * Time: 14:39
 */

namespace App\Services\FilterCondition;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

interface FilterConditionServiceInterface
{
    /**
     * @param Request $request
     * @return Builder|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function filter(Request $request);
}