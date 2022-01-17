<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\BlogCategoryStoreRequest;
use App\Http\Requests\Blog\BlogCategoryUpdateRequest;
use App\Models\BlogCategory;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = BlogCategory::paginate('20');
        return view('blog.admin.categories.index', compact('categories'));
    }

    public function create()
    {
        $categories = BlogCategory::all();
        return view('blog.admin.categories.create', compact('categories'));
    }

    public function store(BlogCategoryStoreRequest $request)
    {
        $data = $request->input();
        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['name']);
        }

        $item = BlogCategory::create($data);

        if ($item) {
            return redirect()->route('admin_categories.index')->with('success', 'Category was created');
        } else {
            return back()->withErrors(['msg' => 'Save error']);
        }
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

    public function update(BlogCategoryUpdateRequest $request, $id)
    {
        $item = BlogCategory::find($id);

        if (empty($item)) {
            return back()->withErrors(["msg" => "not found category with id ${id}"])->withInput();
        }

        $data = $request->all();

        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['name']);
        }

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
