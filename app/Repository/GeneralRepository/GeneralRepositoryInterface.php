<?php
/**
 * Created by PhpStorm.
 * User: Suhich
 * Date: 10.02.2019
 * Time: 15:55
 */

namespace App\Repository\GeneralRepository;

use App\Entity\GeneralMapper\GeneralMapper;
use App\Entity\GeneralMapper\GeneralMapperInterface;
use App\Entity\Product\Product;

interface GeneralRepositoryInterface
{

    /**
     * @param GeneralMapperInterface $object
     * @return mixed
     */
    public function save(GeneralMapperInterface $object);

    /**
     * @param GeneralMapperInterface $object
     * @return mixed
     */
    public function delete(GeneralMapperInterface $object);
}