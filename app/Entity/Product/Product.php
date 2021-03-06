<?php
/**
 * Created by PhpStorm.
 * User: Suhich
 * Date: 10.02.2019
 * Time: 12:13
 */

namespace App\Entity\Product;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Product
 * @package App\Entity\Product
 * @property int $id
 * @property string $title
 * @property int $price
 * @property int $type_id
 * @property boolean $is_active
 */
abstract class Product extends Model implements ProductInterface
{

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return void
     */
    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    /**
     * @return int|null
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param int $price
     * @return void
     */
    public function setPrice(int $price)
    {
        $this->price = $price;
    }

    /**
     * @return bool
     */
    public function isActive()
    {
        return $this->is_active;
    }

    /**
     * @param bool $isActive
     */
    public function setIsActive(bool $isActive)
    {
        $this->is_active = $isActive;
    }

    /**
     * @return int
     */
    public function getTypeId()
    {
        return $this->type_id;
    }

    /**
     * @param int $type_id
     */
    public function setTypeId(int $type_id)
    {
        $this->type_id = $type_id;
    }

}