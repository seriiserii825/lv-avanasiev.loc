<?php

namespace App\Http\Repositories;

use Illuminate\Database\Eloquent\Model;

/**
 * Repository for work with model
 * Can't create or edit, is abstract
 */
abstract class CoreRepository
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * Core constructor
     */
    public function __construct()
    {
        $this->model = app($this->getModelClass());
    }

    /**
     * @return mixed
     */
    abstract protected function getModelClass();

    /**
     * Clone model, don't save a status
     * @return \#M#C\Http\Repositories\CoreRepository.getModelClass|\Illuminate\Contracts\Foundation\Application|Model|mixed
     */
    protected function startConditions()
    {
        return clone $this->model;
    }
}
