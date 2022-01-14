<?php

namespace App\Http\Requests\BlogCategory;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class BlogCategoryUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
//        return Auth::check();
    }

    public function rules()
    {
        return [
            'name' => 'required|string|min:4|max:255',
            'slug' => 'required|string|max:255',
            'description' => 'nullable|min:6|max:500',
            'parent_id' => 'nullable|integer|exists:blog_categories,id'
        ];
    }
}
