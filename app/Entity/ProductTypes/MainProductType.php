<?php

namespace App\Entity\ProductTypes;

use Illuminate\Database\Eloquent\Model;

/**
 * Class MainProductType
 * @package App\ProductTypes
 * @property int $id
 * @property string $single
 * @property string $multiple
 */
class MainProductType extends Model
{

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getSingle()
    {
        return $this->single;
    }

    /**
     * @return string
     */
    public function getMultiple()
    {
        return $this->multiple;
    }

}
