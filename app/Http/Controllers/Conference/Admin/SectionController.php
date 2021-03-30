<?php

namespace App\Http\Controllers\Conference\Admin;

use App\Models\ConferenceSection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SectionController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paginator = ConferenceSection::paginate(5);

        return view('conference.admin.section.index', compact('paginator'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $item = new ConferenceSection();
        $categoryList = ConferenceSection::all();

        return view('conference.admin.section.create', compact('item', 'categoryList'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $data = $request->input();
        if(empty($data['slug']))
        {
            $data['slug'] = str::slug($data['title']);
        }

        $item = new ConferenceSection($data);
        $item->save();

        if($item)
        {
            return redirect()->route('blog.admin.categories.edit',[$item->id])->with(['success' => 'success save']);
        }
        else
        {
            return  back()->withErrors(['msg' => ' error save'])->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
