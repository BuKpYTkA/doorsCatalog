<?php
/**
 * Created by PhpStorm.
 * User: Suhich
 * Date: 10.02.2019
 * Time: 12:39
 */

namespace App\Entity\AdditionalProduct;

use App\Entity\Product\Product;

/**
 * Class AdditionalProduct
 * @package App\Entity\AdditionalProduct
 * @property int $type_id
 */
class AdditionalProduct extends Product implements AdditionalProductInterface
{

    protected $fillable = [
        'title',
        'price',
        'is_active',
        'type_id',
        ];

}