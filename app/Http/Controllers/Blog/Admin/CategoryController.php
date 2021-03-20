<?php

namespace App\Http\Controllers\Blog\Admin;


use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use function React\Promise\all;


class CategoryController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index():View
    {
        $paginator = BlogCategory::paginate(5);

        return view('blog.admin.category.index', compact('paginator'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request): Response
    {
        //
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
        $item = BlogCategory::findOrFail($id);
        $categoryList = BlogCategory::all();
        //dd(collect($item)->pluck('id'));
        return view('blog.admin.category.edit',
            compact('item', 'categoryList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return View
     */
    public function update(Request $request, int $id)
    {
        $item = BlogCategory::find(1);
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
            ->route('blog.admin.categories.update', $item->id)
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
