<?php
/**
 * Created by PhpStorm.
 * User: a.neposedov
 * Date: 25.02.2019
 * Time: 14:02
 */

namespace App\Entity\Brand;

/**
 * Class Brand
 * @package App\Entity\Brand
 * @property int $id
 * @property string $title
 */
interface BrandInterface
{

    /**
     * @return int
     */
    public function getId();

    /**
     * @return string
     */
    public function getTitle();

    /**
     * @param string $title
     */
    public function setTitle(string $title);

}