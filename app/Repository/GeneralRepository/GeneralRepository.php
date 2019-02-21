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
    public function find(int $id): Model
    {
        return $this->model->find($id);
    }
    /**
     * @return void
     */
    public function save(Model $model): void
    {
        $model->save();
    }

    /**
     * @throws \Exception
     */
    public function delete(): void
    {
        $this->model->delete();
    }

}