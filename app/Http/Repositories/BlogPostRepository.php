<?php

namespace App\Http\Repositories;


use App\BlogPost;

class BlogPostRepository
{

    protected $model;

    /**
     * Core constructor
     */
    public function __construct()
    {
        $this->model = app($this->getModelClass());
    }

    public function getAllWithPaginate($count = null)
    {
        $fields = ['id', 'title'];
        return $this->startConditions()
            ->select($fields)
            ->paginate($count);
    }
    /**
     * @return string
     */
    protected function getModelClass()
    {
        return BlogPost::class;
    }

    protected function startConditions()
    {
        return clone $this->model;
    }

}
