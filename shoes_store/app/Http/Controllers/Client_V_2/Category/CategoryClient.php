<?php

namespace App\Http\Controllers\Client_V_2\Category;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Product\ProductRepositoryInterface;
use App\Models\Categories;

class CategoryClient extends Controller
{
    /**
    *
    * @return void
    */
    public function __construct(CategoryRepositoryInterface $category, ProductRepositoryInterface $product)
    {
      $this->category = $category;
      $this->product = $product;
    }

    public function index(Request $request)
    {
        try {
            switch ($request->slug) {
                case Categories::IS_SALE:
                    $products = $this->product->getSellProductsCate(config('constants.pagination'));
                    break;
                case Categories::NEWS:
                    $products = $this->product->getNewProductsCate(config('constants.pagination'));
                    break;
                default:
                    $findCategory = $this->category->getCategoryBySlug($request->slug);
                    $products = null;
                    if (!empty($findCategory)) {
                        $arrayCate = !$findCategory->children->isEmpty() ? array_merge(array($findCategory->id), $findCategory->children->pluck('id')->toArray()) : array($findCategory->id);
                        $products = $this->product->getProductFollowCategory($arrayCate, config('constants.pagination'));
                    }
                    break;
            }
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            return back();
        }

        // dd($products);
        return view('client_v_2.category.index', compact('products'));
    }
}
