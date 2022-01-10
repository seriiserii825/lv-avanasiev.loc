<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = BlogCategory::paginate('20');
        return view('blog.admin.categories.index', compact('categories'));
    }

    public function create()
    {
        dd(__METHOD__);
    }

    public function store(Request $request)
    {
        dd(__METHOD__);
    }

    public function show($id)
    {
        dd(__METHOD__);
    }

    public function edit($id)
    {
        dd(__METHOD__);
    }

    public function update(Request $request, $id)
    {
        dd(__METHOD__);
    }

    public function destroy($id)
    {
        dd(__METHOD__);
    }
}
