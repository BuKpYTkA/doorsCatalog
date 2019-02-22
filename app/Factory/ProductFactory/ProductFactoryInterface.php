<?php
/**
 * Created by PhpStorm.
 * User: Suhich
 * Date: 10.02.2019
 * Time: 15:16
 */

namespace App\Factory\ProductFactory;

use Illuminate\Database\Eloquent\Model;

interface ProductFactoryInterface
{
    /**
     * @return Model
     */
    public function create();

}