<?php
/**
 * Created by PhpStorm.
 * User: Suhich
 * Date: 10.02.2019
 * Time: 14:00
 */

namespace App\Entity\Image;

use App\Entity\MainProduct\MainProduct;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Image
 * @package App\Entity\Image
 * @property int $id
 * @property int $main_product_id
 * @property string $url
 */
class Image extends Model implements ImageInterface
{

    protected $fillable = [
        'main_product_id',
        'url'
    ];

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

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
    public function setMainProductId(int $mainProductId)
    {
        $this->main_product_id = $mainProductId;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @return string
     */
    public function getGoogleUrl()
    {
        return str_replace('open', 'uc', $this->url);
    }

    /**
     * @param string $url
     */
    public function setUrl(string $url)
    {
        $this->url = $url;
    }

}