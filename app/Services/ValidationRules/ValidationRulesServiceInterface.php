<?php
/**
 * Created by PhpStorm.
 * User: a.neposedov
 * Date: 22.02.2019
 * Time: 12:36
 */

namespace App\Services\ValidationRules;

interface ValidationRulesServiceInterface
{
    /**
     * @return array
     */
    public function getMainProductRules();

    /**
     * @return array
     */
    public function getAdditionalProductRules();
}