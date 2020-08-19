<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Banners;
use App\Http\Requests\Admin\Banner\BannerCreateRequest;
use App\Http\Requests\Admin\Banner\BannerEditRequest;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $banners = new Banners;
        if ($request->id) {
            $banners = $banners->where('id', $request->id);
        }
        if ($request->name) {
            $banners = $banners->where('name', 'like', '%' . $request->name . '%');
        }
        if ($request->status) {
            $banners = $banners->where('status', $request->status);
        }

        $banners = $banners->orderBy('created_at', 'asc')->paginate(15);

        return view('admin.banner.index', compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.banner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BannerCreateRequest $request)
    {
        \DB::beginTransaction();
        try {
            $filename = null;
            if ($request->hasFile('image')) {
                $filename = $this->uploadImage(Banners::DIRECTORY, $request->file('image'));
            }

            $data = [
                'name' => $request->name,
                'image' => $filename,
                'url' => $request->url,
            ];

            Banners::create($data);

            \DB::commit();
            flash('Created Successfully!', ['name' => 'Insert successfully'])->success();
            return redirect()->route('banner.index');
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
        $banner = Banners::find($id);
        if (empty($banner)) {
            flash('Not find banner!')->warning();
            return redirect()->back();
        }

        return view('admin.banner.show', compact('banner'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $banner = Banners::find($id);
        if (empty($banner)) {
            flash('Not find banner!')->warning();
            return redirect()->back();
        }

        return view('admin.banner.edit', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BannerEditRequest $request, $id)
    {
        \DB::beginTransaction();
        try {
            $banner = Banners::find($id);
            if (empty($banner)) {
                \DB::rollBack();
                \Log::error($e->getMessage());
                flash('error', ['name' => 'Update error'])->error();
                return back();
            }
            
            $filename = null;
            if ($request->hasFile('image')) {
                $filename = $this->uploadImage(Banners::DIRECTORY, $request->file('image'), $request->old_image);
            }

            $data = [
                'name' => $request->name,
                'image' => $filename ?? $banner->image,
                'url' => $request->url,
            ];

            $banner->update($data);

            \DB::commit();
            flash('Update Successfully!', ['name' => 'Update successfully'])->success();
            return redirect()->route('banner.index');
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
            $banner = Banners::find($id);
            if (empty($banner)) {
                flash('Not find banner!')->warning();
                return redirect()->back();
            }

            $banner->delete();
            \DB::commit();
            flash('Delete Successfully!', ['name' => 'Delete successfully'])->success();
            return redirect()->route('banner.index');
        } catch (\Exception $e) {
            \DB::rollBack();
            \Log::notice($e->getMessage());
            return back();
        }
    }
}
