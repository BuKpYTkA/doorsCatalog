<?php
/**
 * Created by PhpStorm.
 * User: Suhich
 * Date: 09.02.2019
 * Time: 23:06
 */

namespace App\Entity\MainProduct;

use App\Entity\Brand\Brand;
use App\Entity\Image\Image;
use App\Entity\Image\ImageInterface;
use App\Entity\Product\Product;
use App\Entity\ProductTypes\MainProductType;
use App\Services\RelationsService\MainProductRelations;

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

    public function setImages($images)
    {
        $this->images = $images;
    }

    public function getImages()
    {
        return $this->images;
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
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images()
    {
        return $this->hasMany(Image::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function type()
    {
        return $this->belongsTo(MainProductType::class);
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }

    public function scopeWithRelations($query)
    {
        return $query->with(MainProductRelations::RELATIONS);
    }

}