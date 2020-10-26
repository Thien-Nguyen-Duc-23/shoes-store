<?php
namespace App\Repositories\News;

interface NewsRepositoryInterface
{
    // get three new
    public function getThreeNew($limit);
    // get all new
    public function getNews();
    // get news detail
    public function findNewsBySlug($slug);
    // getRelateNews
    public function getRelateNews($id, $limit);
}
