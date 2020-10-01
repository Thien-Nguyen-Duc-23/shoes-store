<?php

namespace App\Http\Controllers\Client\ViewComposers;

use Illuminate\View\View;
use App\Repositories\Category\CategoryRepositoryInterface;

class HeaderComposer
{
  protected $category;

  /**
  * Create a category composer.
  *
  * @return void
  */
  public function __construct(CategoryRepositoryInterface $category)
  {
    $this->category = $category;
  }

  /**
  * Bind data to the view.
  *
  * @param  View  $view
  * @return void
  */
  public function compose(View $view)
  {
    $categoriesShareView = $this->category->getTreeViewCategory();

    $view->with(['categoriesShareView' => $categoriesShareView]);
  }
}
