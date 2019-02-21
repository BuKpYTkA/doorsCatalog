<?php
/**
 * Created by PhpStorm.
 * User: Suhich
 * Date: 10.02.2019
 * Time: 14:00
 */

namespace App\Entity\Image;


use App\Entity\GeneralMapper\GeneralMapperInterface;
use App\Entity\MainProduct\MainProductInterface;

interface ImageInterface extends GeneralMapperInterface
{
    /**
     * @return MainProductInterface
     */
    public function getMainProduct();

    /**
     * @param int $id
     * @return mixed
     */
    public function setMainProductId(int $id);

    /**
     * @return string
     */
    public function getUrl();

    /**
     * @param string $url
     * @return mixed
     */
    public function setUrl(string $url);
}