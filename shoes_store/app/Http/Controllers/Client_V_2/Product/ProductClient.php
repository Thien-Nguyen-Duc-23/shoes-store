<?php

namespace App\Http\Controllers\Client_V_2\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Product\ProductRepositoryInterface;

class ProductClient extends Controller
{
    protected $product;

    const NUMBER_LIMIT_PRODUCT = 8;
    const NUMBER_LIMIT_CATEGORY = 3;

    /**
    * Create a product composer.
    *
    * @return void
    */
    public function __construct(ProductRepositoryInterface $product)
    {
      $this->product = $product;
    }

    public function index(Request $request)
    {
        $productDetailBySlug = $this->product->getDetailProductBySlug($request->slug);

        if (empty($productDetailBySlug)) {
            return redirect()->back();
        }

    }
}
