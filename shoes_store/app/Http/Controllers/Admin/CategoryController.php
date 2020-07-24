<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Http\Requests\Admin\Category\CategoryCreatRequest;
use App\Http\Requests\Admin\Category\CategoryEditRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories = new Categories;
        if ($request->id) {
            $categories = $categories->where('id', $request->id);
        }
        if ($request->name) {
            $categories = $categories->where('name', 'like', '%' . $request->name . '%');
        }

        $categories = $categories->orderBy('created_at', 'asc')->paginate(15);

        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryCreatRequest $request)
    {
        \DB::beginTransaction();
        try {
            $filename = null;
            if ($request->hasFile('image')) {
                $file       = $request->file('image');
                $extension  = $file->getClientOriginalExtension();
                $filename   = uniqid().'_'.time().'_'.date('Ymd').'.'.$extension;
                $uploadDir = Categories::DIRECTORY;
                $file->storeAs($uploadDir, $filename, config('filesystems.public_disk'));
            }

            $data = [
                'name' => $request->name,
                'image' => $filename,
                'description' => $request->description,
            ];

            Categories::create($data);

            \DB::commit();
            flash('Created Successfully!', ['name' => 'Insert successfully'])->success();
            return redirect()->route('category.index');
        } catch (\Exception $e) {
            \DB::rollBack();
            \Log::error($e->getMessage());
            flash('error', ['name' => 'Insert error'])->error();
            return back();
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
        $category = Categories::find($id);
        if (empty($category)) {
            flash('Not find category!')->warning();
            return redirect()->back();
        }

        return view('admin.category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Categories::find($id);
        if (empty($category)) {
            flash('Not find category!')->warning();
            return redirect()->back();
        }

        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryEditRequest $request, $id)
    {
        \DB::beginTransaction();
        try {
            $category = Categories::find($id);
            if (empty($category)) {
                \DB::rollBack();
                \Log::error($e->getMessage());
                flash('error', ['name' => 'Update error'])->error();
                return back();
            }
            
            if ($request->hasFile('image')) {
                if (\Storage::disk('public')->exists(Categories::DIRECTORY.'/'.$category->image)) {
                    \Storage::disk(config('filesystems.public_disk'))->delete(Categories::DIRECTORY.'/'.$category->image);
                }

                $file       = $request->file('image');
                $extension  = $file->getClientOriginalExtension();
                $filename   = uniqid().'_'.time().'_'.date('Ymd').'.'.$extension;
                $uploadDir = Categories::DIRECTORY;
                $file->storeAs($uploadDir, $filename, config('filesystems.public_disk'));
            }

            $data = [
                'name' => $request->name,
                'image' => $filename ?? $category->image,
                'description' => $request->description,
            ];

            $category->update($data);

            \DB::commit();
            flash('Update Successfully!', ['name' => 'Update successfully'])->success();
            return redirect()->route('category.index');
        } catch (\Exception $e) {
            \DB::rollBack();
            \Log::error($e->getMessage());
            flash('error', ['name' => 'Update error'])->error();
            return back();
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
            $category = Categories::find($id);
            if (empty($category)) {
                flash('Not find category!')->warning();
                return redirect()->back();
            }

            $category->delete();
            \DB::commit();
            flash('Delete Successfully!', ['name' => 'Delete successfully'])->success();
            return redirect()->route('category.index');
        } catch (\Exception $e) {
            \DB::rollBack();
            \Log::notice($e->getMessage());
            return back();
        }
    }
}
