<?php

namespace App\Entity\ProductTypes;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AdditionalProductType
 * @package App\ProductTypes
 * @property int $id
 * @property string $single
 * @property string $multiple
 */
class AdditionalProductType extends Model
{

    /**
     * @var int
     */
    private $count;

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

    /**
     * @return int
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * @param int $count
     */
    public function setCount(int $count)
    {
        $this->count = $count;
    }

}
