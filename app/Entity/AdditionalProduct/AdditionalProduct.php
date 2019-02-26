<?php
/**
 * Created by PhpStorm.
 * User: Suhich
 * Date: 10.02.2019
 * Time: 12:39
 */

namespace App\Entity\AdditionalProduct;

use App\Entity\Product\Product;
use App\Entity\ProductTypes\AdditionalProductType;

/**
 * Class AdditionalProduct
 * @package App\Entity\AdditionalProduct
 * @property int $type_id
 */
class AdditionalProduct extends Product implements AdditionalProductInterface
{

    /**
     * @var AdditionalProductType
     */
    private $type;

    protected $fillable = [
        'title',
        'price',
        'is_active',
        'type_id',
        ];

    /**
     * @return AdditionalProductType
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param AdditionalProductType $type
     */
    public function setType(AdditionalProductType $type)
    {
        $this->type = $type;
    }

}