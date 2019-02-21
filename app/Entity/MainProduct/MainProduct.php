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
 * @property ImageInterface[]
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

//    /**
//     * MainProduct constructor.
//     * @param string $title
//     * @param int $price
//     * @param string $brand
//     * @param string $description
//     */
//    public function __construct(
//        string $title = null,
//        int $price = null,
//        string $brand = null,
//        string $description = null)
//    {
//        $this->title = $title;
//        $this->price = $price;
//        $this->brand = $brand;
//        $this->description = $description;
//    }


    /**
     * @return string
     */
    public function getBrand(): string
    {
        return $this->brand;
    }

    /**
     * @param string $brand
     */
    public function setBrand(string $brand): void
    {
        $this->brand = $brand;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return ImageInterface[]|\Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function getImages()
    {

    }

}