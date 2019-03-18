<?php
/**
 * Created by PhpStorm.
 * User: a.neposedov
 * Date: 27.02.2019
 * Time: 17:54
 */

namespace App\Services\SortCondition;

use Illuminate\Http\Request;

class SortConditionService implements SortConditionServiceInterface
{

    const SORT = 'sort';
    const CHEAP = 'cheap';
    const EXPENSIVE = 'expensive';
    const TITLE = 'title';
    const NEWEST = 'newest';
    const OLDEST = 'oldest';

    /**
     * @param $queryBuilder
     * @param Request $request
     * @param array $appends
     * @return array
     */
    public function sort($queryBuilder, Request $request, array $appends = [])
    {
        $sortMethod = $request->input(self::SORT);
        if ($sortMethod) {
            switch ($sortMethod) {
                case self::CHEAP:
                    $queryBuilder = $queryBuilder->orderBy('price');
                    break;
                case self::EXPENSIVE:
                    $queryBuilder = $queryBuilder->orderBy('price', 'desc');
                    break;
                case self::TITLE:
                    $queryBuilder = $queryBuilder->orderBy('title');
                    break;
                case self::NEWEST:
                    $queryBuilder = $queryBuilder->orderBy('created_at');
                    break;
                case self::OLDEST:
                    $queryBuilder = $queryBuilder->orderBy('created_at', 'desc');
                    break;
                default:
                    $queryBuilder = $queryBuilder->orderBy('created_at');
            }
            $appends[self::SORT] = $sortMethod;
        }
        else {
            $queryBuilder = $queryBuilder->orderBy('created_at');
        }
        return [
            'builder' => $queryBuilder,
            'appends' => $appends
        ];
    }

}