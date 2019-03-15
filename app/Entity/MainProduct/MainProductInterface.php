<?php
/**
 * Created by PhpStorm.
 * User: Suhich
 * Date: 09.02.2019
 * Time: 23:00
 */

namespace App\Entity\MainProduct;

use App\Entity\Brand\BrandInterface;
use App\Entity\Image\Image;
use App\Entity\Image\ImageInterface;
use App\Entity\Product\ProductInterface;
use App\Entity\ProductTypes\MainProductType;
use Illuminate\Database\Eloquent\Collection;

interface MainProductInterface extends ProductInterface
{

    /**
     * @return string
     */
    public function getDescription();

    /**
     * @return int
     */
    public function getBrandId();


    /**
     * @param string $description
     * @return void
     */
    public function setDescription(string $description);

    /**
     * @param int $brand
     * @return void
     */
    public function setBrandId(int $brand);

    /**
     * @return ImageInterface[]
     */
    public function getImages();

    /**
     * @param ImageInterface[] $images
     */
    public function setImages(Collection $images);

    /**
     * @return BrandInterface
     */
    public function getBrand();

    /**
     * @return MainProductType
     */
    public function getType();

    /**
     * @param BrandInterface $brand
     */
    public function setBrand(BrandInterface $brand);

    /**
     * @param MainProductType $type
     */
    public function setType(MainProductType $type);

    public function images();

}