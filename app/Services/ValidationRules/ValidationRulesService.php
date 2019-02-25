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
            'brand' => 'required',
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

    /**
     * @return array
     */
    public function getFeedBackRules()
    {
        return [
            'name' => 'string',
            'email' => 'email',
            'phone' => 'string|required',
            'commentary' => 'string',
        ];
    }

}