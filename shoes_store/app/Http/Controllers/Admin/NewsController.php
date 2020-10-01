<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\News;
use App\Http\Requests\Admin\News\NewsCreateRequest;
use App\Http\Requests\Admin\News\NewsEditRequest;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $news = new News;
        if ($request->id) {
            $news = $news->where('id', $request->id);
        }
        if ($request->name) {
            $news = $news->where('name', 'like', '%' . $request->name . '%');
        }

        $news = $news->orderBy('created_at', 'asc')->paginate(15);

        return view('admin.news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsCreateRequest $request)
    {
        \DB::beginTransaction();
        try {
            $filename = null;
            if ($request->hasFile('image')) {
                $filename = $this->uploadImage(News::DIRECTORY, $request->file('image'));
            }

            $data = [
                'slug' => $request->slug,
                'name' => $request->name,
                'image' => $filename,
                'title' => $request->title,
                'sort_description' => $request->sort_description,
                'long_description' => $request->long_description,
            ];

            News::create($data);

            \DB::commit();
            flash('Created Successfully!', ['name' => 'Insert successfully'])->success();
            return redirect()->route('news.index');
        } catch (\Exception $e) {
            \DB::rollBack();
            \Log::error($e->getMessage());
            flash('error', ['name' => 'Insert error'])->error();
            return back()->withInput();
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
        $news = News::find($id);
        if (empty($news)) {
            flash('Not find news!')->warning();
            return redirect()->back();
        }

        return view('admin.news.show', compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news = News::find($id);
        if (empty($news)) {
            flash('Not find news!')->warning();
            return redirect()->back();
        }

        return view('admin.news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NewsEditRequest $request, $id)
    {
        \DB::beginTransaction();
        try {
            $news = News::find($id);
            if (empty($news)) {
                \DB::rollBack();
                \Log::error($e->getMessage());
                flash('error', ['name' => 'Update error'])->error();
                return back();
            }
            $filename = $news->image;
            if ($request->hasFile('image')) {
                $filename = $this->uploadImage(News::DIRECTORY, $request->file('image'), $news->image);
            }

            $data = [
                'slug' => $request->slug,
                'name' => $request->name,
                'image' => $filename,
                'title' => $request->title,
                'sort_description' => $request->sort_description,
                'long_description' => $request->long_description,
            ];

            $news->update($data);

            \DB::commit();
            flash('Update Successfully!', ['name' => 'Update successfully'])->success();
            return redirect()->route('news.index');
        } catch (\Exception $e) {
            \DB::rollBack();
            \Log::error($e->getMessage());
            flash('error', ['name' => 'Update error'])->error();
            return back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        \DB::beginTransaction();
        try {
            $news = News::find($id);
            if (empty($news)) {
                flash('Not find news!')->warning();
                return redirect()->back();
            }

            $news->delete();
            \DB::commit();
            flash('Delete Successfully!', ['name' => 'Delete successfully'])->success();
            return redirect()->route('news.index');
        } catch (\Exception $e) {
            \DB::rollBack();
            \Log::notice($e->getMessage());
            return back();
        }
    }
}
