<?php
/**
 * Created by PhpStorm.
 * User: Suhich
 * Date: 09.02.2019
 * Time: 23:06
 */

namespace App\Entity\MainProduct;


use App\Entity\Image\Image;
use App\Entity\Image\ImageInterface;
use App\Entity\Product\Product;
use Illuminate\Database\Eloquent\Model;

/**
 * class Handle
 * @package App
 * @property string $brand
 * @property string $description
 * @property string $type
 *
 */
class MainProduct extends Product implements MainProductInterface
{
    /**
     * @var array
     */
    protected $fillable = [
        'title',
        'price',
        'brand',
        'description',
    ];

    /**
     * @return string|null
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * @param string $brand
     * @return void
     */
    public function setBrand(string $brand)
    {
        $this->brand = $brand;
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