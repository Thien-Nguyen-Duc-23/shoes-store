<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Shoes;
use App\Models\Categories;
use Carbon\Carbon;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $newProducts = $this->getProductNew();
        $saleProducts = $this->getProductSale();

        $categories = Categories::with(['children', 'shoes'])
            ->whereNull('parent_id')
            ->orwhere('parent_id', 0)
            ->orderBy('created_at', 'desc')
            ->get();

        $cateName = null;
        $resultProducts = null;
        if ($request->slug == 'is-sale') {
            $cateName = 'On Sale!';
            $resultProducts = $saleProducts;
        }

        if ($request->slug == 'new') {
            $cateName = 'New Products';
            $resultProducts = $newProducts;
        }

        if ($request->slug !== 'is-sale' && $request->slug !== 'new') {
            $findCategory = Categories::with('children')->where('slug', $request->slug)->first();
            $arrayCate = array($findCategory->id);
            if (!$findCategory->children->isEmpty()) {
                $arrayCate = array_merge($arrayCate, $findCategory->children->pluck('id')->toArray());
            }

            $resultProducts = Categories::with(['shoes' => function($query) use($arrayCate) {
                $query->where('status', Shoes::ACTIVE)
                    ->whereIn('category_id', $arrayCate)
                    ->orderBy('created_at', 'desc');
            }])
                ->where('slug', $request->slug)
                ->first();
        }

        return view('client.category.index', compact('newProducts', 'categories', 'saleProducts', 'resultProducts', 'cateName'));
    }

    public function getProductSale()
    {
        return Shoes::where('status', Shoes::ACTIVE)
            ->where('is_sale', Shoes::IS_SALE)
            ->whereDate('start_date_sale', '<=', Carbon::now()->format('y-m-d'))
            ->whereDate('end_date_sale', '>', Carbon::now()->format('y-m-d'))
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function getProductNew()
    {
        return Shoes::where('is_sale', '<>', Shoes::IS_SALE)
            ->where('status', Shoes::ACTIVE)
            ->orderBy('created_at', 'desc')
            ->get();
    }
}
