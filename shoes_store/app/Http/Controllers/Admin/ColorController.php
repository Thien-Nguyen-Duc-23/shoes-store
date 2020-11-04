<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Colors;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $colors = new Colors;
        if ($request->id) {
            $colors = $colors->where('id', $request->id);
        }
        if ($request->name) {
            $colors = $colors->where('name', 'like', '%' . $request->name . '%');
        }

        $colors = $colors->orderBy('created_at', 'asc')->paginate(15);

        return view('admin.color.index', compact('colors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.color.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        \DB::beginTransaction();
        try {
            $data = [
                'name' => $request->name,
                'color_code' => $request->color_code,
            ];
            Colors::create($data);

            \DB::commit();
            flash('Created Successfully!', ['name' => 'Insert successfully'])->success();
            return redirect()->route('color.index');
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
        $color = Colors::find($id);
        if (!$color) {
            flash('Not find color!')->warning();
            return redirect()->back();
        }

        return view('admin.color.edit', compact('color'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        \DB::beginTransaction();
        try {
            $data = [
                'name' => $request->name,
                'color_code' => $request->color_code
            ];
            Colors::where('id', $id)->update($data);

            \DB::commit();
            flash('Update Successfully!', ['name' => 'Update successfully'])->success();
            return redirect()->route('color.index');
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
            $color = Colors::find($id);
            if (!$color) {
                flash('Not find size!')->warning();
                return redirect()->back();
            }

            $color->delete();
            \DB::commit();
            flash('Delete Successfully!', ['name' => 'Delete successfully'])->success();
            return redirect()->route('color.index');
        } catch (\Exception $e) {
            \DB::rollBack();
            \Log::notice($e->getMessage());
            return back();
        }
    }
}
