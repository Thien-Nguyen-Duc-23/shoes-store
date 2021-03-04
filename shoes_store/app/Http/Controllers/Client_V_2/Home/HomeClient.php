<?php

namespace App\Http\Controllers\Client_V_2\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Product\ProductRepositoryInterface;

class HomeClient extends Controller
{
    protected $category;
    protected $product;

    const NUMBER_LIMIT_PRODUCT = 8;
    const NUMBER_LIMIT_CATEGORY = 3;

    /**
    * Create a category composer.
    *
    * @return void
    */
    public function __construct(CategoryRepositoryInterface $category, ProductRepositoryInterface $product)
    {
      $this->category = $category;
      $this->product = $product;
    }

    public function index()
    {
        $categories = $this->category->getCategoryHomePage(HomeClient::NUMBER_LIMIT_CATEGORY);
        $newProducts = $this->product->getNewProducts(HomeClient::NUMBER_LIMIT_PRODUCT);
        $sellProducts = $this->product->getSellProducts(HomeClient::NUMBER_LIMIT_PRODUCT);
        // dd($sellProducts);

        return view('client_v_2.home.index', compact('categories', 'newProducts', 'sellProducts'));
    }
}
