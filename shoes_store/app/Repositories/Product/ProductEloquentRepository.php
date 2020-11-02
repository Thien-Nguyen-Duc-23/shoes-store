<?php
namespace App\Repositories\Product;

use App\Repositories\EloquentRepository;
use Illuminate\Support\Facades\DB;
use App\Models\Shoes;
use Carbon\Carbon;

class ProductEloquentRepository extends EloquentRepository implements ProductRepositoryInterface
{
    public function getModel()
    {
        return Shoes::class;
    }

    // get news product
    public function getNewProducts($limit)
    {
        return $this->model::with('shoesImages')
            ->where('status', Shoes::ACTIVE)
            ->orderBy('created_at', 'desc')
            ->limit($limit)
            ->get();
    }

    // get product sell
    public function getSellProducts($limit)
    {
        return $this->model::with('shoesImages')
            ->where('status', Shoes::ACTIVE)
            ->where('is_sale', Shoes::IS_SALE)
            ->whereDate('start_date_sale', '<=', Carbon::now()->format('y-m-d'))
            ->whereDate('end_date_sale', '>', Carbon::now()->format('y-m-d'))
            ->orderBy('created_at', 'desc')
            ->limit($limit)
            ->get();
    }
}
