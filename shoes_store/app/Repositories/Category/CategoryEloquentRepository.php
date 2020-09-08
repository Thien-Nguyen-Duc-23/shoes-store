<?php
namespace App\Repositories\Category;

use App\Repositories\EloquentRepository;
use Illuminate\Support\Facades\DB;
use App\Models\Categories;

class CategoryEloquentRepository extends EloquentRepository implements CategoryRepositoryInterface
{
    public function getModel()
    {
        return Categories::class;
    }

    public function getParentCategory()
    {
        return $this->model::whereNull('parent_id')->select('name', 'id')->get();
    }

    public function getTreeViewCategory()
    {
        return $this->model::with('children')
            ->whereNull('parent_id')
            ->orWhere('parent_id', 0)
            ->orderBy('created_at', 'desc')
            ->get();
    }
}
