<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\News\NewsRepositoryInterface;

class NewsController extends Controller
{
  protected $news;

  /**
  *
  * @return void
  */
  public function __construct(NewsRepositoryInterface $news)
  {
    $this->news = $news;
  }

  /**
  *
  * @return void
  */
  public function index(Request $request)
  {
    $threeNews = $this->news->getThreeNew(3);
    $getNews = $this->news->getNews();

    return view('client.news.index', compact('threeNews', 'getNews'));
  }

  public function detail(Request $request)
  {
    $newsDetail = $this->news->findNewsBySlug($request->slug);
    $relateNews = null;
    if (!empty($newsDetail)) {
      $relateNews = $this->news->getRelateNews($newsDetail->id, 4);
    }

    return view('client.news.detail', compact('newsDetail', 'relateNews'));
  }
}
