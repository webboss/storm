<?php

namespace App\Http\Controllers\Blog\Admin;


use App\Http\Requests\BlogCategoryCreateRequest;
use App\Http\Requests\BlogCategoryUpdateRequest;
use App\Models\BlogCategory;
use App\Repositories\BlogPostRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Illuminate\Support\Str;
use function React\Promise\all;


class PostController extends BaseController
{
    /**
     * @var BlogPostRepository
     */

    private BlogPostRepository $blogCategoryRepository;

    public function __construct()
    {
        parent::__constructor();
        $this->blogCategoryRepository = app(BlogPostRepository::class);
    }
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index():View
    {
        $paginator = BlogCategory::paginate(5);
       // $paginator = $this->BlogPostRepository->getAllWithPaginate(5);
        return view('blog.admin.post.index', compact('paginator'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        $item = new BlogCategory();
        $categoryList = $this->BlogPostRepository->getForComboBox();

        return view('blog.admin.category.create', compact('item', 'categoryList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param BlogCategoryCreateRequest $request
     * @return  Redirector|RedirectResponse
     */
    public function store(BlogCategoryCreateRequest $request)
    {
        $data = $request->input();
        if(empty($data['slug']))
        {
            $data['slug'] = str::slug($data['title']);
        }

        $item = new BlogCategory($data);
        $item->save();

        if($item) {
            return redirect()->route('blog.admin.categories.edit',[$item->id])->with(['success' => 'success save']);
        }
        else {
            return  back()->withErrors(['msg' => ' error save'])->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show(int $id): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return View
     */
    public function edit(int $id):View
    {
        $item = $this->BlogPostRepository->getEdit($id);
        $categoryList = $this->BlogPostRepository->getForComboBox();
        //dd(collect($item)->pluck('id'));

        return view('blog.admin.category.edit',
            compact('item', 'categoryList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return  Redirector|RedirectResponse
     * @throws ValidationException
     */
    public function update(BlogCategoryUpdateRequest $request, int $id)
    {

        $item = $this->BlogPostRepository->getEdit($id);
        if(empty($item))
        {
            return back()
                ->withErrors(['msg' => "not found item id{$id}"])
                ->withInput();
        }

        $data = $request->all();

        $result = $item->fill($data)->save();

        if($result)
        {
            return redirect()
                ->route('blog.admin.categories.edit', $item->id)
                ->with(['success' => 'yes update']);
        } else {
            return back()
                ->withErrors(['msg' => "message arror"])
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy(int $id): Response
    {
        //
    }
}
