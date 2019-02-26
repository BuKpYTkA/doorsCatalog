<?php
/**
 * Created by PhpStorm.
 * User: Suhich
 * Date: 09.02.2019
 * Time: 23:06
 */

namespace App\Entity\MainProduct;

use App\Entity\Brand\BrandInterface;
use App\Entity\Image\ImageInterface;
use App\Entity\Product\Product;
use App\Entity\ProductTypes\MainProductType;

/**
 * class Handle
 * @package App
 * @property int $brand_id
 * @property string $description
 */
class MainProduct extends Product implements MainProductInterface
{

    /**
     * @var ImageInterface[]
     */
    private $images;

    /**
     * @var BrandInterface
     */
    private $brand;

    /**
     * @var MainProductType
     */
    private $type;

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

    /**
     * @return ImageInterface[]
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * @param ImageInterface[] $images
     */
    public function setImages(array $images)
    {
        $this->images = $images;
    }

    /**
     * @return BrandInterface
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * @return MainProductType
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param BrandInterface $brand
     */
    public function setBrand(BrandInterface $brand)
    {
        $this->brand = $brand;
    }

    /**
     * @param MainProductType $type
     */
    public function setType(MainProductType $type)
    {
        $this->type = $type;
    }

}