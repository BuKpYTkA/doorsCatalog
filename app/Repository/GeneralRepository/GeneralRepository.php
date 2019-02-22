<?php
/**
 * Created by PhpStorm.
 * User: Suhich
 * Date: 10.02.2019
 * Time: 15:58
 */

namespace App\Repository\GeneralRepository;

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
     * @return Model
     */
    public function find(int $id)
    {
        return $this->model->find($id);
    }

    /**
     * @param int $paginator |null
     * @return \Illuminate\Database\Eloquent\Collection|Model[]
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

}