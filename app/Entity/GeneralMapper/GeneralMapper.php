<?php
/**
 * Created by PhpStorm.
 * User: Suhich
 * Date: 10.02.2019
 * Time: 13:57
 */

namespace App\Entity\GeneralMapper;


use Illuminate\Database\Eloquent\Model;

/**
 * Class GeneralMapper
 * @package App\Entity\GeneralMapper
 * @property int $id
 */
class GeneralMapper extends Model implements GeneralMapperInterface
{
    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

}