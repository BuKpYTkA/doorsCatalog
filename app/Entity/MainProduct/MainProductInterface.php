<?php
/**
 * Created by PhpStorm.
 * User: Suhich
 * Date: 09.02.2019
 * Time: 23:00
 */

namespace App\Entity\MainProduct;

use App\Entity\Product\ProductInterface;
use Illuminate\Database\Eloquent\Builder;

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
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images();

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function brand();

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function type();

    /**
     * @param $query
     * @return mixed
     */
    public function scopeActive(Builder $query);

}