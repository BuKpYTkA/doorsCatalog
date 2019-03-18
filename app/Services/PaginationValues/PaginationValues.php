<?php
/**
 * Created by PhpStorm.
 * User: a.neposedov
 * Date: 25.02.2019
 * Time: 17:57
 */

namespace App\Services\PaginationValues;


class PaginationValues
{
    const TWO = 2;

    const FIVE = 5;

    const DEFAULT = 10;

    const FIFTY = 50;

    const TWENTY_FIVE = 25;

    const PAGINATION_VALUES = [
        'TWO' => self::TWO,
        'FIVE' => self::FIVE,
        'DEFAULT' => self::DEFAULT,
        'TWENTY_FIVE' => self::TWENTY_FIVE,
        'FIFTY' => self::FIFTY,
    ];

}