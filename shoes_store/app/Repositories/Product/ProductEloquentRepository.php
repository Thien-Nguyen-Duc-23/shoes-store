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

    public function baseQuery()
    {
        return $this->model::with('shoesImages')
            ->where('status', Shoes::ACTIVE)
            ->orderBy('created_at', 'desc');
    }

    public function baseQuerySell()
    {
        return $this->baseQuery()
            ->where('is_sale', Shoes::IS_SALE)
            ->whereDate('start_date_sale', '<=', Carbon::now()->format('y-m-d'))
            ->whereDate('end_date_sale', '>', Carbon::now()->format('y-m-d'));
    }

    // get news product category
    public function getNewProducts($limit)
    {
        return $this->baseQuery()->limit($limit)->get();
    }

    // get product sell home page
    public function getSellProducts($limit)
    {
        return $this->baseQuerySell()->limit($limit)->get();
    }

    // get product sell category
    public function getSellProductsCate($pagination)
    {
        return $this->baseQuerySell()->paginate($pagination);
    }

    // get product sell category
    public function getNewProductsCate($pagination)
    {
        return $this->baseQuery()->paginate($pagination);
    }

    // get detail product by slug
    public function getDetailProductBySlug($slug)
    {
        return $this->model::with('shoesImages', 'colors', 'sizes', 'categories')
            ->where('slug', $slug)
            ->first();
    }

    // get relation product
    public function getRelationProduct($id, $arrayCate, $limit)
    {
        return $this->baseQuery()
            ->whereIn('category_id', $arrayCate)
            ->where('id', '<>', $id)
            ->limit($limit)
            ->get();
    }

    // get product follow category
    public function getProductFollowCategory($arrayCate, $pagination)
    {   
        return $this->baseQuery()
            ->whereIn('category_id', $arrayCate)
            ->paginate($pagination);
    }
}
