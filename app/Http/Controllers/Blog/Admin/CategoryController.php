<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Http\Controllers\Controller;
use App\Http\Repositories\BlogCategoryRepository;
use App\Http\Requests\BlogCategory\BlogCategoryCreateRequest;
use App\Http\Requests\BlogCategory\BlogCategoryUpdateRequest;
use App\Models\BlogCategory;
use Illuminate\Database\QueryException;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    private $blogCategoryRepository;
    public function __construct()
    {
       $this->blogCategoryRepository = app(BlogCategoryRepository::class);
    }

    public function index()
    {
        $categories = BlogCategory::query()->orderByDesc('updated_at')->paginate('20');
        return view('blog.admin.categories.index', compact('categories'));
    }

    public function create()
    {
        $categories = BlogCategory::all();
        return view('blog.admin.categories.create', compact('categories'));
    }

    public function store(BlogCategoryCreateRequest $request)
    {
       $data = $request->input();
       if(empty($data['slug'])){
           $data['slug'] = Str::slug($data['name']);
       }
       $item = new BlogCategory($data);
       $item->save();

        if ($item) {
            return redirect()->route('admin_categories.index')->with('success', 'Category was created');
        }else{
            return redirect()->back()->withError(["msg" => "Save fails"])->withInput();
        }
    }

    public function show($id)
    {
        dd(__METHOD__);
    }

    public function edit($id)
    {
        $item = $this->blogCategoryRepository->getEdit($id);
        if (empty($item)) {
            abort(404);
        }
        $categories = $this->blogCategoryRepository->getForComboBox();
        return view('blog.admin.categories.edit', compact('item', 'categories'));
    }

    public function update(BlogCategoryUpdateRequest $request, $id)
    {
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
