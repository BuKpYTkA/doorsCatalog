<?php
/**
 * Created by PhpStorm.
 * User: Suhich
 * Date: 10.02.2019
 * Time: 15:55
 */

namespace App\Repository\GeneralRepository;

use Illuminate\Database\Eloquent\Model;

interface GeneralRepositoryInterface
{
    /**
     * @param int $id
     * @return Model
     */
    public function find(int $id);

    /**
     * @param Model $model
     * @return void
     */
    public function save(Model $model);

    /**
     * @param Model $model
     */
    public function delete(Model $model);

    /**
     * @param int $paginator |null
     * @return \Illuminate\Database\Eloquent\Collection|Model[]
     */
    public function findAll(int $paginator = null);

    /**
     * @param $id
     * @return  Model|404
     */
    public function findOrFail($id);

}

