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
}
