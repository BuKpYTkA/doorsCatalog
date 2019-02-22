<?php
/**
 * Created by PhpStorm.
 * User: Suhich
 * Date: 10.02.2019
 * Time: 16:28
 */

namespace App\Repository\ImageRepository;

use App\Entity\Image\Image;
use App\Repository\GeneralRepository\GeneralRepository;

class ImageRepository extends GeneralRepository implements ImageRepositoryInterface
{

    /**
     * ImageRepository constructor.
     * @param Image $image
     */
    public function __construct(Image $image)
    {
        parent::__construct($image);
    }
}