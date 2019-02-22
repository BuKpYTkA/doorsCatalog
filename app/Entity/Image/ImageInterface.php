<?php
/**
 * Created by PhpStorm.
 * User: Suhich
 * Date: 10.02.2019
 * Time: 14:00
 */

namespace App\Entity\Image;

use App\Entity\MainProduct\MainProductInterface;

interface ImageInterface
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

    /**
     * @return string
     */
    public function getGoogleUrl();

    /**
     * @return int
     */
    public function getId();
}