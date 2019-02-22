<?php
/**
 * Created by PhpStorm.
 * User: Suhich
 * Date: 10.02.2019
 * Time: 12:39
 */

namespace App\Entity\AdditionalProduct;

use App\Entity\Product\Product;

class AdditionalProduct extends Product implements AdditionalProductInterface
{

    protected $fillable = [
        'title',
        'price',
        'is_active',
        'type',
        ];

//    /**
//     * AdditionalProduct constructor.
//     * @param string|null $title
//     * @param int|null $price
//     */
//    public function __construct(
//        string $title = null,
//        int $price = null
//    )
//    {
//        $this->title = $title;
//        $this->price = $price;
//    }

}