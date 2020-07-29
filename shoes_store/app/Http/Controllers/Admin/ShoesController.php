<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Shoes;
use App\Models\Categories;
use App\Models\Colors;
use App\Models\Sizes;

class ShoesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $shoes = new Shoes;
        if ($request->id) {
            $shoes = $shoes->where('id', $request->id);
        }
        if ($request->name) {
            $shoes = $shoes->where('name', 'like', '%' . $request->name . '%');
        }

        $shoes = $shoes->with('categories')->orderBy('created_at', 'asc')->paginate(15);

        return view('admin.shoes.index', compact('shoes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $colors = Colors::all()->pluck('name', 'id')->toArray();
        $sizes = Sizes::all()->pluck('name', 'id')->toArray();
        $categories = Categories::all()->pluck('name', 'id')->toArray();
        // dd($categories);
        return view('admin.shoes.create', compact('categories', 'sizes', 'colors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
     * @param  \Illuminate\Http\Request  $request
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
