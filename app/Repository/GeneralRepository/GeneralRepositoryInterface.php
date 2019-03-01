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
     * @param array $params
     * @return Collection
     */
    public function findWhere(array $params);

    /**
     * @param string $title
     * @return Model|404
     */
    public function findByTitle(string $title);

    /**
     * @param array $ids
     * @return Collection
     */
    public function whereIn(array $ids);
}

