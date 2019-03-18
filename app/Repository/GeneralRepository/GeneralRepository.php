<?php
/**
 * Created by PhpStorm.
 * User: Suhich
 * Date: 10.02.2019
 * Time: 15:58
 */

namespace App\Repository\GeneralRepository;

use App\Services\RelationsService\MainProductRelations;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

abstract class GeneralRepository implements GeneralRepositoryInterface
{

    /**
     * @var Model
     */
    private $model;

    /**
     * GeneralRepository constructor.
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * @param int $id
     * @return Model|null
     */
    public function find(int $id)
    {
        return $this->model->find($id);
    }

    /**
     * @param int $paginator |null
     * @return Collection Model|LengthAwarePaginator
     */
    public function findAll(int $paginator = null)
    {
        if ($paginator) {
            return $this->model->paginate($paginator);
        }
        return $this->model->all();
    }

    /**
     * @param $id
     * @return  Model|404
     */
    public function findOrFail($id)
    {
        return $this->model->findOrFail($id);
    }

    /**
     * @param Model $model
     * @return void
     */
    public function save(Model $model)
    {
        $model->save();
    }

    /**
     * @param Model $model
     * @return void
     * @throws \Exception
     */
    public function delete(Model $model)
    {
        $model->delete();
    }


    /**
     * @param array $ids
     * @return Collection
     */
    public function whereIn(array $ids)
    {
        return $this->model->whereIn('id', $ids)->get();
    }

    /**
     * @param string $title
     * @return Model|404
     */
    public function findByTitle(string $title)
    {
        return $this->model->where('title', $title)->firstOrFail();
    }

    /**
     * @param string $column
     * @param array $params
     * @return mixed
     */
    public function where(string $column, array $params)
    {
        return $this->model->whereIn($column, $params);
    }

    /**
     * @return Model
     */
    public function queryBuilder()
    {
        return $this->model;
    }

}