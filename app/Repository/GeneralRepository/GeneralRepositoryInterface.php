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
use Illuminate\Database\Eloquent\Model;

interface GeneralRepositoryInterface
{

    /**
     * @param int $id
     * @return Model
     */
    public function find(int $id);

    /**
     * @throws \Exception
     */
    public function delete(): void;

    /**
     * @return void
     */
    public function save(): void;
}