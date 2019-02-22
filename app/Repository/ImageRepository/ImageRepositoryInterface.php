<?php
/**
 * Created by PhpStorm.
 * User: Suhich
 * Date: 10.02.2019
 * Time: 16:27
 */

namespace App\Repository\ImageRepository;

use App\Repository\GeneralRepository\GeneralRepositoryInterface;
use Faker\Provider\Image;

interface ImageRepositoryInterface extends GeneralRepositoryInterface
{

    /**
     * @param int $id
     * @return Image
     */
    public function find(int $id);
}