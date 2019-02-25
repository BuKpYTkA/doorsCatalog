<?php
/**
 * Created by PhpStorm.
 * User: Suhich
 * Date: 09.02.2019
 * Time: 23:06
 */

namespace App\Entity\MainProduct;

use App\Entity\Product\Product;

/**
 * class Handle
 * @package App
 * @property int $brand_id
 * @property string $description
 */
class MainProduct extends Product implements MainProductInterface
{

    /**
     * @var array
     */
    protected $fillable = [
        'title',
        'price',
        'brand_id',
        'description',
        'is_active',
        'type_id',
    ];

    /**
     * @return int|null
     */
    public function getBrandId()
    {
        return $this->brand_id;
    }

    /**
     * @param int $brand
     * @return void
     */
    public function setBrandId(int $brand)
    {
        $this->brand_id = $brand;
    }

    /**
     * @return string|null
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return void
     */
    public function setDescription(string $description)
    {
        $this->description = $description;
    }

}