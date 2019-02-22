<?php
/**
 * Created by PhpStorm.
 * User: a.neposedov
 * Date: 22.02.2019
 * Time: 12:31
 */

namespace App\Services\ValidationRules;


class ValidationRulesService implements ValidationRulesServiceInterface
{

    /**
     * @return array
     */
    public function getMainProductRules()
    {
        return [
            'title' => 'string|min:3|max:200|required',
            'price' => 'numeric|required',
            'brand' => 'string|min:1|max:50',
            'type' => 'required',
        ];
    }

    /**
     * @return array
     */
    public function getAdditionalProductRules()
    {
        return [
            'title' => 'string|min:3|max:200|required',
            'price' => 'numeric|required',
            'type' => 'required',
        ];
    }

}