<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Shoes\ShoesCreateRequest;
use App\Http\Requests\Admin\Shoes\ShoesEditRequest;
use App\Models\Shoes;
use App\Models\Categories;
use App\Models\Colors;
use App\Models\Sizes;
use App\Models\ShoesImages;
use Carbon\Carbon;
use App\Models\ShoesColors;
use App\Models\ShoesSizes;

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

        return view('admin.shoes.create', compact('categories', 'sizes', 'colors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ShoesCreateRequest $request)
    {
        \DB::beginTransaction();
        try {
            $filename = null;
            if ($request->hasFile('image')) {
                $filename = $this->uploadImage(Shoes::DIRECTORY, $request->file('image'));
            }

            $data = [
                'name' => $request->name,
                'image' => $filename,
                'sku' => $request->sku,
                'slug' => $request->slug,
                'sort_description' => $request->sort_description,
                'category_id' => $request->category_id,
                'price_cost' => $request->price_cost,
                'price' => $request->price,
                'is_sale' => $request->is_sale ? 1 : 0,
                'price_sale' => $request->price_sale ?? null,
                'start_date_sale' => $request->start_date_sale ? Carbon::parse($request->start_date_sale)->format('Y-m-d') : null,
                'end_date_sale' => $request->end_date_sale ? Carbon::parse($request->end_date_sale)->format('Y-m-d') : null,
                'long_description' => $request->long_description,
            ];

            $shoes = Shoes::create($data);
            if ($shoes) {
                foreach ($request->colors as $color) {
                    $dataColor = [
                        'shoes_id' => $shoes->id,
                        'color_id' => $color,
                    ];
                    ShoesColors::create($dataColor);
                }

                foreach ($request->sizes as $size) {
                    $dataSize = [
                        'shoes_id' => $shoes->id,
                        'size_id' => $size,
                    ];
                    ShoesSizes::create($dataSize);
                }

                if (isset($request->shoesImages)) {
                    foreach ($request->shoesImages as $shoesImage) {
                        $dataShoesImage = [
                            'shoes_id' => $shoes->id,
                            'image' => $filename = $this->uploadImage(ShoesImages::DIRECTORY, $shoesImage),
                        ];
                        ShoesImages::create($dataShoesImage);
                    }
                }
            }

            \DB::commit();
            flash('Created Successfully!', ['name' => 'Insert successfully'])->success();
            return redirect()->route('shoes.index');
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
        $shoes = Shoes::find($id);
        if (empty($shoes)) {
            flash('Not find shoes!')->warning();
            return redirect()->back();
        }
        $shoesColors = Colors::WhereHas('shoesColors', function ($query) use ($id) {
            $query->where('shoes_id', $id);
        })
            ->get()
            ->pluck('id')
            ->toArray();
        $shoesSizes = Sizes::WhereHas('shoesSizes', function ($query) use ($id) {
            $query->where('shoes_id', $id);
        })
            ->get()
            ->pluck('id')
            ->toArray();
        $oldShoesImages = ShoesImages::where('shoes_id', $id)->get()->pluck('image', 'id')->toArray();
        $colors = Colors::all()->pluck('name', 'id')->toArray();
        $sizes = Sizes::all()->pluck('name', 'id')->toArray();
        $categories = Categories::all()->pluck('name', 'id')->toArray();

        return view('admin.shoes.show', compact('shoes', 'shoesSizes', 'shoesColors', 'categories', 'sizes', 'colors', 'oldShoesImages'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $shoes = Shoes::find($id);
        if (empty($shoes)) {
            flash('Not find shoes!')->warning();
            return redirect()->back();
        }
        $shoesColors = Colors::WhereHas('shoesColors', function ($query) use ($id) {
            $query->where('shoes_id', $id);
        })
            ->get()
            ->pluck('id')
            ->toArray();
        $shoesSizes = Sizes::WhereHas('shoesSizes', function ($query) use ($id) {
            $query->where('shoes_id', $id);
        })
            ->get()
            ->pluck('id')
            ->toArray();
        $oldShoesImages = ShoesImages::where('shoes_id', $id)->get()->pluck('image', 'id')->toArray();
        $colors = Colors::all()->pluck('name', 'id')->toArray();
        $sizes = Sizes::all()->pluck('name', 'id')->toArray();
        $categories = Categories::all()->pluck('name', 'id')->toArray();

        return view('admin.shoes.edit', compact('shoes', 'shoesSizes', 'shoesColors', 'categories', 'sizes', 'colors', 'oldShoesImages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ShoesEditRequest $request, $id)
    {
        // \DB::beginTransaction();
        // try {
            $shoes = Shoes::find($id);
            if (empty($shoes)) {
                \DB::rollBack();
                \Log::error($e->getMessage());
                flash('error', ['name' => 'Not find shoes'])->error();
                return back();
            }

            if ($request->hasFile('image')) {
                $filename = $this->uploadImage(Shoes::DIRECTORY, $request->file('image'));
            }

            $isSale = $request->is_sale;
            if (!is_numeric($isSale)) {
                $isSale = $isSale === 'on' ? 1 : 0;
            }

            $data = [
                'name' => $request->name,
                'image' => $filename ?? $shoes->image,
                'sku' => $request->sku,
                'slug' => $request->slug,
                'sort_description' => $request->sort_description,
                'category_id' => $request->category_id,
                'price_cost' => $request->price_cost,
                'price' => $request->price,
                'is_sale' => $isSale ?? 0,
                'price_sale' => $request->price_sale ?? null,
                'start_date_sale' => $request->start_date_sale ? Carbon::parse($request->start_date_sale)->format('Y-m-d') : null,
                'end_date_sale' => $request->end_date_sale ? Carbon::parse($request->end_date_sale)->format('Y-m-d') : null,
                'long_description' => $request->long_description,
            ];
            
            $shoes = $shoes->update($data);
            if ($shoes) {
                ShoesColors::where('shoes_id', $id)->delete();
                foreach ($request->colors as $color) {
                    $dataColor = [
                        'shoes_id' => $id,
                        'color_id' => $color,
                    ];
                    ShoesColors::create($dataColor);
                }

                ShoesSizes::where('shoes_id', $id)->delete();
                foreach ($request->sizes as $size) {
                    $dataSize = [
                        'shoes_id' => $id,
                        'size_id' => $size,
                    ];
                    ShoesSizes::create($dataSize);
                }

                if (isset($request->shoesImages)) {
                    foreach ($request->shoesImages as $shoesImage) {
                        $dataShoesImage = [
                            'shoes_id' => $id,
                            'image' => $filename = $this->uploadImage(ShoesImages::DIRECTORY, $shoesImage),
                        ];
                        ShoesImages::create($dataShoesImage);
                    }
                }
            }

            \DB::commit();
            flash('Update Successfully!', ['name' => 'Update successfully'])->success();
            return redirect()->route('shoes.index');
        // } catch (\Exception $e) {
        //     \DB::rollBack();
        //     \Log::error($e->getMessage());
        //     flash('error', ['name' => 'Update error'])->error();
        //     return back();
        // }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $shoes = Shoes::find($id);
            if (empty($shoes)) {
                \DB::rollBack();
                \Log::error($e->getMessage());
                flash('error', ['name' => 'Not find shoes'])->error();
                return back();
            }
            ShoesColors::where('shoes_id', $id)->delete();
            ShoesSizes::where('shoes_id', $id)->delete();
            ShoesImages::where('shoes_id', $id)->delete();

            $shoes->delete();
            \DB::commit();
            flash('Delete Successfully!', ['name' => 'Delete successfully'])->success();
            return redirect()->route('shoes.index');
        } catch (\Exception $e) {
            \DB::rollBack();
            \Log::notice($e->getMessage());
            return back();
        }
    }
}
