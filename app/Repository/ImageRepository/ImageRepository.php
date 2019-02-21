<?php
/**
 * Created by PhpStorm.
 * User: Suhich
 * Date: 10.02.2019
 * Time: 16:28
 */

namespace App\Repository\ImageRepository;


use App\Entity\Image\Image;
use App\Entity\Image\ImageInterface;
use App\Repository\GeneralRepository\GeneralRepository;

class ImageRepository extends GeneralRepository implements ImageRepositoryInterface
{

    /**
     * @param int $id
     * @return ImageInterface
     */
    public function find(int $id)
    {
        return Image::find($id);
    }

}