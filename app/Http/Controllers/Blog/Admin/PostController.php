<?php

namespace App\Http\Controllers\Blog\Admin;

use App\BlogPost;
use App\Http\Controllers\Controller;
use App\Http\Repositories\BlogCategoryRepository;
use App\Http\Repositories\BlogPostRepository;
use App\Http\Requests\Blog\BlogPostCreateRequest;
use App\Http\Requests\Blog\BlogPostUpdateRequest;
use App\Jobs\BlogPostAfterCreateJob;
use App\Models\BlogCategory;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use PHPUnit\Exception;

class PostController extends Controller
{
    /**
     * @var BlogPostRepository
     */
    private $blogPostRepository;
    /**
     * @var BlogCategoryRepository
     */
    private $blogCategoryRepository;

    public function __construct()
    {
        $this->blogPostRepository = app(BlogPostRepository::class);
        $this->blogCategoryRepository = app(BlogCategoryRepository::class);
    }

    public function index()
    {
        $posts = $this->blogPostRepository->getAllWithPaginate(20);
        return view('blog.admin.posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = $this->blogCategoryRepository->getForComboBox();
        return view('blog.admin.posts.create', compact('categories'));
    }

    public function store(BlogPostCreateRequest $request)
    {
        $data = $request->input();
        $item = new BlogPost($data);
        $item->save();

        if (!empty($item)) {
            return redirect()->route('admin_posts.index')->with('success', 'Category was created');
        } else {
            return redirect()->back()->withError(["msg" => "Save fails"])->withInput();
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        try {
//            $item = $this->blogPostRepository->getEdit($id);
            $item = BlogPost::query()->findOrFail($id);
            $categories = $this->blogCategoryRepository->getForComboBox();
            $some = $item->attributes();
            return view('blog.admin.posts.edit', compact('item', 'categories'));
        } catch (\Exception $exception) {
            return redirect()->route('admin_posts.index')->withErrors(['msg' => $exception->getMessage()]);
        }

    }

    /**
     * Update the specified resource in storage.
     * @param \Illuminate\Http\Request $request
     * @param int $id
     */
    public function update(BlogPostUpdateRequest $request, $id)
    {
        $item = $this->blogPostRepository->getEdit($id);
        if (empty($item)) {
            return back()->withErrors(["msg" => "Id with ${id} don't exists"])->withInput();
        }
        $data = $request->all();

        try {
            $item->update($data);
            return redirect()->route('admin_posts.edit', $id)->with(['success' => 'Success save data']);
        } catch (QueryException $exception) {
            return back()->with(['error' => $exception->getMessage()]);
        }
    }

    public function destroy($id)
    {
        try {
            BlogPost::find($id)->delete();
            return redirect()->route('admin_posts.index')->with('success', "Post ${id} was deleted");
        } catch (QueryException $e) {
            return back()->withErrors(['msg' => $e->getMessage()]);
        }
    }
}
