<?php
/**
 * Created by PhpStorm.
 * User: Suhich
 * Date: 10.02.2019
 * Time: 15:58
 */

namespace App\Repository\GeneralRepository;


use App\Entity\GeneralMapper\GeneralMapper;
use App\Entity\GeneralMapper\GeneralMapperInterface;

abstract class GeneralRepository implements GeneralRepositoryInterface
{
    /**
     * @param GeneralMapperInterface $object
     * @return void
     */
    public function save(GeneralMapperInterface $object)
    {
        $object->save();
    }

    /**
     * @param GeneralMapperInterface $object
     * @return void
     */
    public function delete(GeneralMapperInterface $object)
    {
        $object->delete();
    }

}