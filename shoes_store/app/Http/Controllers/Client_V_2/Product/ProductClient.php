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

  public function detail(Request $request)
  {
    $productDetailBySlug = $this->product->getDetailProductBySlug($request->slug);

    if (empty($productDetailBySlug)) {
      return redirect()->back();
    }

    // get array Category
    $arrayCate = array($productDetailBySlug->categories->id);
    if (!$productDetailBySlug->categories->children->isEmpty()) {
      $arrayCate = array_merge($arrayCate, $productDetailBySlug->categories->children->pluck('id')->toArray());
    }

    $relationProducts = $this->product->getRelationProduct($productDetailBySlug->id, $arrayCate, ProductClient::NUMBER_LIMIT_PRODUCT);

    return view('client_v_2.product.detail', compact('productDetailBySlug', 'relationProducts'));
  }
}
