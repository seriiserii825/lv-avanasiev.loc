<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

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
        $item = BlogCategory::findOrFail($id);
        $categories = BlogCategory::all();
        return view('blog.admin.categories.edit', compact('item', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'description' => 'nullable|min:6|max:500',
            'parent_id' => 'nullable|integer|exists:blog_categories,id'
        ];
        $request->validate($rules);


        $item = BlogCategory::find($id);
        if (empty($item)) {
            return back()->with(["error" => "not found category with id ${id}"])->withInput();
        }
        $data = $request->all();
        try {
            $item->fill($data)->save();
            return redirect()->route('admin_categories.edit', $id)->with(['success' => 'Success save data']);
        } catch (QueryException $exception) {
            return back()->with(['error' => $exception->getMessage()]);
        }
    }

    public function destroy($id)
    {
        dd(__METHOD__);
    }
}
