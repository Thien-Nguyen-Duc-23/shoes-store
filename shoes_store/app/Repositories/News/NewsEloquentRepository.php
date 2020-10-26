<?php
namespace App\Repositories\News;

use App\Repositories\EloquentRepository;
use Illuminate\Support\Facades\DB;
use App\Models\News;

class NewsEloquentRepository extends EloquentRepository implements NewsRepositoryInterface
{
    public function getModel()
    {
        return News::class;
    }

    public function getThreeNew($limit)
    {
        return $this->model::orderBy('created_at', 'desc')->limit($limit)->get();
    }

    public function getNews()
    {
        $idThreeNew = $this->getThreeNew(3)->pluck('id')->toArray();

        return $this->model::whereNotIn('id', $idThreeNew)
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function findNewsBySlug($slug)
    {
        return $this->model::where('slug', $slug)
            ->first();
    }

    public function getRelateNews($id, $limit)
    {
        return $this->model::where('id', '<>', $id)
            ->orderBy('created_at', 'desc')
            ->limit($limit)
            ->get();
    }
}
