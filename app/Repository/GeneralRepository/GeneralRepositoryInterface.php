<?php
/**
 * Created by PhpStorm.
 * User: Suhich
 * Date: 10.02.2019
 * Time: 15:55
 */

namespace App\Repository\GeneralRepository;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface GeneralRepositoryInterface
{


    /**
     * @param int $id
     * @return Model|null
     */
    public function find(int $id);

    /**
     * @param int $paginator |null
     * @return Collection Model|LengthAwarePaginator
     */
    public function findAll(int $paginator = null);

    /**
     * @param $id
     * @return  Model|404
     */
    public function findOrFail($id);

    /**
     * @param Model $model
     * @return void
     */
    public function save(Model $model);

    /**
     * @param Model $model
     * @return void
     * @throws \Exception
     */
    public function delete(Model $model);

    /**
     * @param array $ids
     * @return Collection
     */
    public function whereIn(array $ids);

    /**
     * @param string $column
     * @param array $params
     * @return mixed
     */
    public function where(string $column, array $params);

    /**
     * @return Model
     */
    public function queryBuilder();

    /**
     * @param array $criteria
     * @param array $inputs
     * @return void
     */
    public function updateOrCreate(array $criteria, array $inputs);
}

