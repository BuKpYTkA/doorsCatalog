<?php
/**
 * Created by PhpStorm.
 * User: a.neposedov
 * Date: 22.02.2019
 * Time: 17:19
 */

namespace App\Factory\ImageFactory;

use App\Entity\Image\Image;

interface ImageFactoryInterface
{
    /**
     * @param int|null $productId
     * @param string|null $url
     * @return Image
     */
    public function create(int $productId = null, string $url = null);

}