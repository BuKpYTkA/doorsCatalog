<?php
/**
 * Created by PhpStorm.
 * User: a.neposedov
 * Date: 18.03.2019
 * Time: 16:08
 */

namespace App\Services\PaginationService;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class PaginationService implements PaginationServiceInterface
{
    const PAGINATION = 'per_page';

    /**
     * @var int
     */
    private $paginator;

    /**
     * @param $queryBuilder
     * @param Request $request
     * @param array $appends
     * @return LengthAwarePaginator
     */
    public function paginate($queryBuilder, Request $request, array $appends = [])
    {
        $this->setPagination($request);
        $paginatedList = $queryBuilder->paginate($this->paginator);
        if ($appends) {
            foreach ($appends as $key => $value) {
                $paginatedList->appends($key, $value);
            }
        }
        return $paginatedList;
    }

    /**
     * @param Request $request
     */
    private function setPagination(Request $request)
    {
        $paginator = (int)$request->get(self::PAGINATION);
        if ($paginator && in_array($paginator, PaginationValues::PAGINATION_VALUES)) {
            $this->paginator = $paginator;
        } else {
            $this->paginator = PaginationValues::DEFAULT;
        }
    }
}