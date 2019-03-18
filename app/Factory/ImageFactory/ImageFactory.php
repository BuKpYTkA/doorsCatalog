<?php
/**
 * Created by PhpStorm.
 * User: a.neposedov
 * Date: 22.02.2019
 * Time: 17:15
 */

namespace App\Factory\ImageFactory;

use App\Entity\Image\Image;

class ImageFactory implements ImageFactoryInterface
{

    /**
     * @param int|null $productId
     * @param string|null $url
     * @return Image
     */
    public function create(int $productId = null, string $url = null)
    {
        return new Image([
            'main_product_id' => $productId,
            'url' => $url,
            'output_url' => str_replace('open', 'uc', $url),
        ]);
    }

}