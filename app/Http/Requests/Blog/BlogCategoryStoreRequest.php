<?php

namespace App\Http\Requests\Blog;

use Illuminate\Foundation\Http\FormRequest;

class BlogCategoryStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|min:5|max:200',
            'slug' => 'nullable|min:5|max:200',
            'description' => 'nullable|min:5|max:500',
            'parent_id' => 'required|integer|exists:blog_categories,id'
        ];
    }
}
