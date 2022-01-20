<?php

namespace App\Http\Repositories;


use App\BlogPost;
use Illuminate\Pagination\LengthAwarePaginator;

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

    /**
     * @param $count
     * @return LengthAwarePaginator
     */
    public function getAllWithPaginate($count = null)
    {
        $columns = [
            'id',
            'title',
            'category_id',
            'user_id',
            'is_published',
            'published_at',
            'updated_at',
        ];
        $result = $this->startConditions()
            ->select($columns)
//            ->with(['category', 'user'])
            ->with(['category:id,name', 'user:id,name'])
            ->orderByDesc('id')
            ->paginate($count);
        return $result;
    }

    /**
     * @return string
     */
    protected function getModelClass()
    {
        return BlogPost::class;
    }

    public function getEdit($id)
    {
        return $this->startConditions()->findOrFail($id);
    }

    protected function startConditions()
    {
        return clone $this->model;
    }

}
