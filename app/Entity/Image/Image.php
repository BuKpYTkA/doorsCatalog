<?php
/**
 * Created by PhpStorm.
 * User: Suhich
 * Date: 10.02.2019
 * Time: 14:00
 */

namespace App\Entity\Image;


use App\Entity\GeneralMapper\GeneralMapper;
use App\Entity\MainProduct\MainProduct;
use App\Entity\MainProduct\MainProductInterface;

/**
 * Class Image
 * @package App\Entity\Image
 * @property int $main_product_id
 * @property string $url
 */
class Image extends GeneralMapper implements ImageInterface
{

    protected $fillable = [
        'mainProduct_id',
        'url'
    ];
//    /**
//     * Image constructor.
//     * @param int $main_product_id
//     * @param string $url
//     */
//    public function __construct(
//        int $main_product_id = null,
//        string $url = null)
//    {
//        $this->main_product_id = $main_product_id;
//        $this->url = $url;
//    }


    /**
     * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Relations\BelongsTo|object
     */
    public function getMainProduct()
    {
        return $this->belongsTo(MainProduct::class);
    }

    /**
     * @param int $mainProductId
     */
    public function setMainProductId(int $mainProductId): void
    {
        $this->main_product_id = $mainProductId;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl(string $url): void
    {
        $this->url = $url;
    }

}